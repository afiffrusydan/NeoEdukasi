<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use App\Models\admin\TutoredStudents;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Vacancy;
use App\Models\Student;
use App\Models\tentor\StudentProgress;
use App\Models\tentor\TentorApplication;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class Tentor_StudentProgressController extends Controller
{
    public function index()
    {
        $studentProgress = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id') 
        ->where('students_progress.status','!=', 10)
        ->where('tutored-students.tentor_id','=', Auth::user()->id)
        ->select('students_progress.*','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','branchs.branch_name')
        ->get()->sortByDesc("month");;
        
        $history = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id') 
        ->where('students_progress.status','=', 10)
        ->where('tutored-students.tentor_id','=', Auth::user()->id)
        ->select('students_progress.*','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','branchs.branch_name')
        ->get()->sortByDesc("month");;
        return view('tentor.pages.student-progress.index', ['stdProgress' => $studentProgress]);
    }

    public function view($id)
    {
        $studentProgress = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id')  
        ->join('students','tutored-students.student_id','=','students.id')
        ->where('students_progress.id','=', $id)
        ->select('students_progress.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName')
        ->get()->first();;
        return view('tentor.pages.student-progress.view', ['data' => $studentProgress]);
    }


    public function create()
    {
        $students = Student::join('tutored-students', 'tutored-students.student_id', '=', 'students.id')
        ->where('tutored-students.tentor_id','=', Auth::user()->id)
        ->get(['tutored-students.id as stdId','students.*', 'tutored-students.subject'])->sortBy('month');
        return view('tentor.pages.student-progress.create',['students'=>$students]);
    }
    public function postCreate(Request $request)
    {   
        $request->validate([
            'tentored_id' => ['required', 'numeric'],
            'learning_progression' => ['required', 'string'],
            'feedback' => ['required', 'string'],
            'study_method' => ['required', 'string'],
            'study_target' => ['required', 'string'],
            'month' => ['required'],
         ]);     
        StudentProgress::create([
            'tentored_student_id' => $request->tentored_id,
            'learning_progression' => $request->learning_progression,
            'feedback' => $request->feedback,
            'study_method' => $request->study_method,
            'study_target' => $request->study_target,
            'month' => $request->month,
            'status' => 0,
        ]);

        
        Alert::success('Success', 'Your job application successfully submitted!');
        return redirect()->route('tentor.progress-report.index');
    }

    public function getMonth(Request $request){

        $id = $request->id;
        $data = TutoredStudents::find($id);
        $timedata = TutoredStudents::select('created_at as month')
        ->where('tutored-students.id','=',$id)
        ->get()->first();
        $strmonth = strtotime($timedata->month); 
        $created_date = date("Y-m",$strmonth);
        $created_1month = $created_date.'-01';
        $created_month = strtotime($created_1month);

        $response = array();
        $start = $month = strtotime("-1 month", $created_month);
        $end = strtotime(date('Y-m-d'));
        while($month <= $end)
        { 
            $month = strtotime("+1 month", $month);
            $checkdate = date('Y-m-d',$month);
            $checkData = StudentProgress::where('tentored_student_id','=', $id)
                ->where('month','=',$checkdate)
                ->get()->first();
                $date=date('Y-m');
                $date1 = $date.'-01';
                $str = strtotime($date1);
                if(!$checkData AND $month <= $str){
                    $response[] = array(
                        "id"=>date('Y-m-d',$month),
                        "text"=>date('F Y', $month), PHP_EOL
                    );
                }
        }    
        return $response;
     }
     
     public function update(Request $request)
     {   
         $request->validate([
             'learning_progression' => ['required', 'string'],
             'feedback' => ['required', 'string'],
             'study_method' => ['required', 'string'],
             'study_target' => ['required', 'string'],
          ]);     
          
        $data = StudentProgress::find($request->id);
        if($data){
            $data->learning_progression = $request->learning_progression;
            $data->feedback = $request->feedback;
            $data->study_method = $request->study_method;
            $data->study_target = $request->study_target;
            $data->status=0;
            $data->save();
        }
        $response = 'Your submission successfully updated!';
         return $response;
     }
}
