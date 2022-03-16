<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\admin\TutoredStudents;

class Admin_TentoredStudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $student = TutoredStudents::join('students', 'tutored-students.student_id','=','students.id')
        ->join('tentors', 'tutored-students.tentor_id','=','tentors.id')
        ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->get([ 'students.first_name as stdFirstName','students.last_name as stdLastName','tentors.first_name as tntrFirstName','tentors.last_name as tntrLastName','tutored-students.subject','tutored-students.status','branchs.branch_name'])->sortByDesc("id");;
        return view('admin.pages.tentored-students.index', ['students' => $student]);
    }
}
