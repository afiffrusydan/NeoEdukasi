<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use App\Models\admin\TentorVerification;
use App\Models\Student;
use App\Models\Tentor;
use App\Models\tentor\FileVerification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use DataTables;

use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class Admin_TentorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $branchs = Branch::all();
        if ($request->ajax()) {
            $data = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
            ->select(['tentors.id','tentors.account_status','tentors.first_name' ,'tentors.last_name','tentors.last_education','tentors.email', 'branchs.branch_name'])->orderBy('tentors.account_status','DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('full_name', function($row){
                        $btn = '<a href="'.route('admin.tentor.detail', ['id' => $row->id]).'">'.$row->first_name.' '.$row->last_name.'</a>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('admin.tentor.detail', ['id' => $row->id]).'" class="btn btn-sm btn-neo ">Detail</a>';
                            return $btn;
                    })
                    ->addColumn('status', function($row){
                    if ($row->account_status == -100){
                        return '<span class="span1 d-inline-block py-1 px-4 bg-danger text-white fs-sm btn-block">Blacklist</span>';
                    }elseif($row->account_status == -50){
                        return '<span class="span1 d-inline-block py-1 px-3 bg-warning text-white fs-sm btn-block">Belum Verifikasi</span>';
                        }elseif($row->account_status == 0){
                        return '<span class="span1 d-inline-block py-1 px-3 bg-success text-white fs-sm btn-block">Belum Interview</span>';
                        }elseif ($row->account_status == 100){
                        return '<span class="span1 d-inline-block py-1 px-3 bg-neo text-white fs-sm btn-block">Aktif Mengajar</span>';
                        }elseif ($row->account_status == 50){
                        return '<span class="span1 d-inline-block py-1 px-4 bg-secondary text-white fs-sm btn-block">Sudah Interview</span>';
                        }
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '50' || $request->get('status') == '100' || $request->get('status') == '-50' || $request->get('status') == '-100') {
                            $instance->where('tentors.account_status',$request->get('status'));
                        }
                        if (!empty($request->get('branch'))) {
                            $instance->where('tentors.branch_id', '=',$request->get('branch'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                               $search = $request->get('search');
                               $w->orWhere('students.first_name', 'LIKE', "%$search%")
                               ->orWhere('tentors.first_name', 'LIKE', "%$search%")
                               ->orWhere('students.last_name', 'LIKE', "%$search%")
                               ->orWhere('tentors.last_name', 'LIKE', "%$search%")
                               ->orWhere('branch_name', 'LIKE', "%$search%");
                           });
                       }
                    })
                    ->rawColumns(['action','status','full_name','tentor_name'])
                    ->make(true);
        }
        
        return view('admin.pages.tentors.index2',['branchs'=>$branchs]);
    }

    public function detail($id)
    {
        $tentor = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('id', $id)->first(['tentors.*', 'branchs.branch_name']);

        $tentor_file = FileVerification::find($id);
        return  View::make('admin.pages.tentors.show', ['tentorData' => $tentor, 'tentorsFile'=>$tentor_file]);
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $tentor = Tentor::find($id);
        
        $tentor->status = $request->status;
        $tentor->save();

        $response="Tentor Status Successfully Updated";
        return $response;
    }
}
