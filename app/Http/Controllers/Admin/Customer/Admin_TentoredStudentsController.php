<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\admin\TutoredStudents;
use DataTables;

class Admin_TentoredStudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
        public function index(Request $request)
    {
        $branchs = Branch::all();
        $subject = TutoredStudents::select('subject')->get();;
        if ($request->ajax()) {
        $data = TutoredStudents::join('students', 'tutored-students.student_id','=','students.id')
        ->join('tentors', 'tutored-students.tentor_id','=','tentors.id')
        ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->select([ 'tutored-students.id AS tntrdId','students.first_name as stdFirstName','students.last_name as stdLastName','tentors.first_name as tntrFirstName','tentors.last_name as tntrLastName','tutored-students.subject','tutored-students.status AS tntrdStatus','branchs.branch_id','branchs.branch_name']);;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('full_name', function($row){
     
                        $btn = '<a href="">'.$row->stdFirstName.' '.$row->stdLastName.'</a>';
    
                        return $btn;
                    })
                    ->addColumn('tentor_name', function($row){
     
                        $btn = '<a href="">'.$row->tntrFirstName.' '.$row->tntrLastName.'</a>';
    
                        return $btn;
                    })
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="" class="btn btn-sm btn-neo ">Detail</a>';
    
                            return $btn;
                    })
                    ->addColumn('status', function($row){
                        if ($row->tntrdStatus == -100){
                        return '<span class="d-inline-block py-1 px-3 bg-danger text-white fs-sm">Tidak Aktif</span>';
                    }elseif ($row->tntrdStatus == 100){
                        return '<span class="d-inline-block py-1 px-3 bg-success text-white fs-sm">Aktif</span>';
                    }
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '100' || $request->get('status') == '-100') {
                            $instance->where('tutored-students.status',$request->get('status'));
                        }
                        if (!empty($request->get('branch'))) {
                            $instance->where('students.branch_id', '=',$request->get('branch'));
                        }
                        if (!empty($request->get('subject'))) {
                            $instance->where('subject', '=',$request->get('subject'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                               $search = $request->get('search');
                               $w->orWhere('students.first_name', 'LIKE', "%$search%")
                               ->orWhere('tentors.first_name', 'LIKE', "%$search%")
                               ->orWhere('students.last_name', 'LIKE', "%$search%")
                               ->orWhere('tentors.last_name', 'LIKE', "%$search%")
                               ->orWhere('branch_name', 'LIKE', "%$search%")
                               ->orWhere('subject', 'LIKE', "%$search%");
                           });
                       }
                    })

                    ->rawColumns(['action','status','full_name','tentor_name'])
                    ->make(true);
        }
        
        return view('admin.pages.tentored-students.index2',['branchs'=>$branchs,'subject'=>$subject]);
    }

    // public function index()
    // {
    //     $student = TutoredStudents::join('students', 'tutored-students.student_id','=','students.id')
    //     ->join('tentors', 'tutored-students.tentor_id','=','tentors.id')
    //     ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
    //     ->get([ 'students.first_name as stdFirstName','students.last_name as stdLastName','tentors.first_name as tntrFirstName','tentors.last_name as tntrLastName','tutored-students.subject','tutored-students.status','branchs.branch_name'])->sortByDesc("id");;
    //     return view('admin.pages.tentored-students.index', ['students' => $student]);
    // }
}
