<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use App\Models\admin\TentorVerification;
use App\Models\Student;
use App\Models\Tentor;
use App\Models\tentor\FileVerification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class Admin_TentorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function tentor_verification()
    {
        $tentor = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->get(['tentors.id','tentors.account_status','tentors.first_name' ,'tentors.last_name','tentors.last_education','tentors.email', 'branchs.branch_name']);
        return view('admin.pages.tentors.index', ['tentors' => $tentor]);
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
