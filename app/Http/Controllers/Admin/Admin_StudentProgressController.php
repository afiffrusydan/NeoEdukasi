<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\admin\Vacancy;
use App\Models\Tentor;
use App\Models\tentor\StudentProgress;
use App\Models\tentor\TentorApplication;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use PDF;

class Admin_StudentProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $stdProgress = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('students_progress.status','!=', 10)
        ->select('students_progress.*','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','tentors.first_name as tntrFirstName', 'tentors.last_name as tntrLastName','branchs.branch_name')
        ->get()->sortByDesc("created_at")->sortByDesc("status");;

        return view('admin.pages.student-progress.index', ['datas' => $stdProgress]);
    }

    public function view($id)
    {
        $studentProgress = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id')  
        ->join('students','tutored-students.student_id','=','students.id')
        ->where('students_progress.id','=', $id)
        ->select('students_progress.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName')
        ->get()->first();;
        return view('admin.pages.student-progress.view', ['data' => $studentProgress]);
    }

    public function approve(Request $request)
    {
        $id = $request->id; 
        $stdProgress = StudentProgress::find($id);
        if($stdProgress){
            $stdProgress->status = 10;
            $stdProgress->save();
        }
        $response="Student Progress Report Status Successfully Updated";
        return $response;
    }

    public function decline(Request $request)
    {
        $id = $request->id; 
        $stdProgress = StudentProgress::find($id);
        if($stdProgress){
            $stdProgress->status = -10;
            $stdProgress->save();
        }
        $response="Student Progress Report Status Successfully Updated";
        return $response;
    }
}
