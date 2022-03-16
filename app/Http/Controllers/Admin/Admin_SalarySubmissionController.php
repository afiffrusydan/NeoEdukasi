<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\admin\Vacancy;
use App\Models\Tentor;
use App\Models\tentor\SalarySubmission;
use App\Models\tentor\StudentProgress;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use PDF;

class Admin_SalarySubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $studentProgress = SalarySubmission::join('tutored-students', 'tutored-students.id', '=', 'salary-submission.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('salary-submission.status','!=', 10)
        ->select('salary-submission.*','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','tentors.first_name as tntrFirstName', 'tentors.last_name as tntrLastName','branchs.branch_name')
        ->get()->sortByDesc("created_at");;
        return view('admin.pages.salary-submission.index', ['datas' => $studentProgress]);
    }

    public function view($id)
    {
        $studentProgress = SalarySubmission::join('tutored-students', 'tutored-students.id', '=', 'salary-submission.tentored_student_id')  
        ->join('students','tutored-students.student_id','=','students.id')
        ->where('salary-submission.id','=', $id)
        ->select('salary-submission.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName')
        ->get()->first();;
        return view('admin.pages.salary-submission.view', ['data' => $studentProgress]);
    }

    public function approve(Request $request)
    {
        $id = $request->id; 
        $stdProgress = SalarySubmission::find($id);
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
        $stdProgress = SalarySubmission::find($id);
        if($stdProgress){
            $stdProgress->status = -10;
            $stdProgress->save();
        }
        $response="Student Progress Report Status Successfully Updated";
        return $response;
    }

    public function get_documentation($id)
    {
        $document = SalarySubmission::findOrFail($id);

        $filePath = $document->documentation;
        $pdfContent = Storage::path($filePath);
        return response()->file($pdfContent);
    }
    public function get_attendance($id)
    {
        $document = SalarySubmission::findOrFail($id);

        $filePath = $document->attendance;
        $pdfContent = Storage::path($filePath);
        return response()->file($pdfContent);
    }
    public function get_proof($id)
    {
        $document = SalarySubmission::findOrFail($id);

        $filePath = $document->proof;
        $pdfContent = Storage::path($filePath);
        return response()->file($pdfContent);
    }
}
