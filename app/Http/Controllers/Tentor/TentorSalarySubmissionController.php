<?php

namespace App\Http\Controllers\Tentor;

use App\Models\Tentor;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\admin\Vacancy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\TutoredStudents;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Crypt;
use App\Models\RatesModel;
use App\Models\tentor\StudentProgress;
use App\Models\tentor\FileVerification;
use App\Models\tentor\SalarySubmission;
use Illuminate\Support\Facades\Storage;
use App\Models\tentor\TentorApplication;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TentorSalarySubmissionController extends Controller
{
    public function index()
    {
        $response = $this->checkData();
        $studentProgress = SalarySubmission::join('tutored-students', 'tutored-students.id', '=', 'salary-submission.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('tutored-students.tentor_id','=', Auth::user()->id)
        ->where('salary-submission.status','!=', 10)
        ->select('salary-submission.*','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','branchs.branch_name')
        ->get()->sortByDesc("month");;

        $history = SalarySubmission::join('tutored-students', 'tutored-students.id', '=', 'salary-submission.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id') 
        ->where('tutored-students.tentor_id','=', Auth::user()->id)
        ->where('salary-submission.status','=', 10)
        ->select('salary-submission.*','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','branchs.branch_name')
        ->orderBy('students.id')->orderBy('month')->get()->sortByDesc("month");;

        $leng = count($response);
        if($leng == 0 ){
            return view('tentor.pages.salary-submission.index2', ['stdProgress' => $studentProgress, 'history'=>$history]);
        }else{
            return view('tentor.pages.salary-submission.index2', ['stdProgress' => $studentProgress, 'history'=>$history])->withErrors(
                [
                    'errors' => 'You have a student progress report that has not been filled out, Please check it in the student progress report menu'
                ]
            );;
        }
        
    }

    public function view($_id)
    {
        $id = Crypt::decrypt($_id);
        $studentProgress = SalarySubmission::join('tutored-students', 'tutored-students.id', '=', 'salary-submission.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->where('salary-submission.id','=',$id)
        ->select('salary-submission.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName')
        ->get()->first();;
        return view('tentor.pages.salary-submission.view', ['data' => $studentProgress]);
    }

    public function update($_id)
    {
        $id = Crypt::decrypt($_id);
        $studentProgress = SalarySubmission::join('tutored-students', 'tutored-students.id', '=', 'salary-submission.tentored_student_id') 
        ->join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->where('salary-submission.id','=',$id)
        ->select('salary-submission.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName')
        ->get()->first();;
        return view('tentor.pages.salary-submission.update', ['data' => $studentProgress]);
    }


    public function create()
    {
        $students = Student::join('tutored-students', 'tutored-students.student_id', '=', 'students.id')
        ->where('tutored-students.tentor_id','=', Auth::user()->id)
        ->get(['tutored-students.id as stdId','students.*', 'tutored-students.subject'])->sortBy('month');
        return view('tentor.pages.salary-submission.create',['students'=>$students]);
    }
    public function postCreate(Request $request)
    {   
        $request->validate([
            'tentored_id' => ['required'],
            'month' => ['required'],
            'meet_hours' => ['required', 'string'],
            'extra_meet_hours' => ['required'],
            'proof' => ['mimes:jpeg,png,jpg'],
            'attendance' => ['required','mimes:jpeg,png,jpg'],
            'documentation' => ['mimes:jpeg,png,jpg'],
         ]);   
         $month = date('Y-m', strtotime($request->month));
        //     //disini ubah kodingan tanggal dulu
            $documentation_destinationPath = 'private/files/tentors/salary-submission/'.$month.'/'.Auth::user()->id.'/'.$request->tentored_id.'/Documentation';
            $attendance_destinationPath = 'private/files/tentors/salary-submission/'.$month.'/'.Auth::user()->id.'/'.$request->tentored_id.'/Attendance';
            $proof_destinationPath = 'private/files/tentors/salary-submission/'.$month.'/'.Auth::user()->id.'/'.$request->tentored_id.'/Proof';
            $proof_file = $request->file('proof');
            $attendance_file = $request->file('attendance');
            $documentation_file = $request->file('documentation');
            

            Storage::put($attendance_destinationPath,$attendance_file);
            $storagePathAtt = Storage::put($attendance_destinationPath,$attendance_file);
            $storageNameAtt = basename($storagePathAtt);


            if($request->has('documentation')){
                Storage::put($documentation_destinationPath,$documentation_file);
                $storagePathDest = Storage::put($documentation_destinationPath,$documentation_file);
                $storageNameDest = basename($storagePathDest);
                $documentationbasepath = $documentation_destinationPath.'/'.$storageNameDest;
            }else{
                $documentationbasepath ="";
            }

            if($request->has('proof')){
                Storage::put($proof_destinationPath,$proof_file);
                $storagePathProf = Storage::put($proof_destinationPath,$proof_file);
                $storageNameProf = basename($storagePathProf);
                $proofbasepath = $proof_destinationPath.'/'.$storageNameProf;
            }else{
                $proofbasepath = "";
            }
            $add_cost = str_replace(array('Rp.','.'), "", $request->add_cost);
            $total = str_replace(array('Rp.','.'), "", $request->total_salary);
            SalarySubmission::create([
                'tentored_student_id' => $request->tentored_id,
                'month' => $request->month,
                'meet_hours' => $request->meet_hours,
                'extra_meet_hours' => $request->extra_meet_hours,
                'documentation' => $documentationbasepath,
                'attendance' => $attendance_destinationPath.'/'.$storageNameAtt,
                'proof' => $proofbasepath,
                'add_cost' => $add_cost,
                'total' => $total,
                'status' => 0,
            ]);
        Alert::success('Success', 'Your submission successfully submitted!');
        return redirect()->route('tentor.salary-submission.index');
    }

    public function getMonth(Request $request){
        $id = $request->id;
        $data = StudentProgress::select('month')
        ->where('tentored_student_id','=',$id)
        ->get();;
        $response = array();
        foreach($data as $data)
        { 
            $checkData=SalarySubmission::select('month')
            ->where('tentored_student_id','=',$id)
            ->where('month','=',$data->month)
            ->get()->first();
            if(!$checkData){
                $response[] = array(
                    "id"=>$data->month,
                    "text"=>date('F Y', strtotime($data->month)), PHP_EOL
                );
            }
        }    
        return $response;
     }

    public function checkData(){

        $id = Auth::user()->id;
        $data = TutoredStudents::select('id')
        ->where('tentor_id','=',$id)->get();
        $response = array();
        foreach($data as $check){
            $timedata = TutoredStudents::select('created_at as month')
            ->where('tutored-students.id','=',$check->id)
            ->get()->first();
            $strmonth = strtotime($timedata->month); 
            $created_date = date("Y-m",$strmonth);
            $created_1month = $created_date.'-13';
            $created_month = strtotime($created_1month);

            
            $start = $month = strtotime("-1 month", $created_month);
            $end = strtotime(date('Y-m-d'));

        while($month <= $end)
        { 
            $month = strtotime("+1 month", $month);
            $checkdate = date('Y-m-d',$month);
            $checkData = StudentProgress::where('tentored_student_id','=', $check->id)
                ->where('month','=',$checkdate)
                ->get()->first();
                $date=date('Y-m-d');
                $date1 = $date;
                $str = strtotime($date1);
                if(!$checkData AND $month <= $str){
                    $response[] = array(
                        "id"=>date('Y-m-d',$month),
                        "text"=>date('F Y', $month), PHP_EOL
                    );
                }
        }
    }
        return $response;
     }
     
     public function postUpdate(Request $request)
     {
        $request->validate([
            'meet_hours' => ['required', 'string'],
            'extra_meet_hours' => ['required'],
            'proof' => ['mimes:jpeg,png,jpg'],
            'attendance' => ['required','mimes:jpeg,png,jpg'],
            'documentation' => ['mimes:jpeg,png,jpg'],
         ]);   
         
         //     //disini ubah kodingan tanggal dulu
         $month = date('Y-m', strtotime($request->month));
            $documentation_destinationPath = 'private/files/tentors/salary-submission/'.$month.'/'.Auth::user()->id.'/'.$request->tentored_id.'/Documentation';
            $attendance_destinationPath = 'private/files/tentors/salary-submission/'.$month.'/'.Auth::user()->id.'/'.$request->tentored_id.'/Attendance';
            $proof_destinationPath = 'private/files/tentors/salary-submission/'.$month.'/'.Auth::user()->id.'/'.$request->tentored_id.'/Proof';
            $proof_file = $request->file('proof');
            $attendance_file = $request->file('attendance');
            $documentation_file = $request->file('documentation');
            $oldData = SalarySubmission::find($request->id);
            if($oldData){
                $oldDocument = $oldData->documentation;
                $oldAttendance = $oldData->attendance;
                $oldProof = $oldData->proof;
                Storage::delete([$oldDocument]);
                Storage::delete([$oldAttendance]);
                Storage::delete([$oldProof]);
                $response = 'Your submission successfully updated!';
                return $response;
            }
            Storage::put($attendance_destinationPath,$attendance_file);
            $storagePathAtt = Storage::put($attendance_destinationPath,$attendance_file);
            $storageNameAtt = basename($storagePathAtt);


            if($request->has('documentation')){
                Storage::put($documentation_destinationPath,$documentation_file);
                $storagePathDest = Storage::put($documentation_destinationPath,$documentation_file);
                $storageNameDest = basename($storagePathDest);
                $documentationbasepath = $documentation_destinationPath.'/'.$storageNameDest;
            }else{
                $documentationbasepath ="";
            }

            if($request->has('proof')){
                Storage::put($proof_destinationPath,$proof_file);
                $storagePathProf = Storage::put($proof_destinationPath,$proof_file);
                $storageNameProf = basename($storagePathProf);
                $proofbasepath = $proof_destinationPath.'/'.$storageNameProf;
            }else{
                $proofbasepath = "";
            }
            
            SalarySubmission::create([
                'tentored_student_id' => $request->tentored_id,
                'month' => $request->month,
                'meet_hours' => $request->meet_hours,
                'extra_meet_hours' => $request->extra_meet_hours,
                'documentation' => $documentationbasepath,
                'attendance' => $attendance_destinationPath.'/'.$storageNameAtt,
                'proof' => $proofbasepath,
                'add_cost' => $request->add_cost,
                'status' => 0,
            ]);
     }

     public function check(Request $request)
     {
         $tentoredid = $request->id;
         $studentdata = TutoredStudents::join('students','students.id','=','tutored-students.student_id')
         ->where('tutored-students.id','=',$request->id)
         ->get(['students.branch_id','students.class_id'])->first();
        $class = $studentdata->class_id;
        $branch = $studentdata->branch_id;
        $response = array();
        $pricedata = ClassModel::join('rates','rates.category','=','class.category')
        ->where('class.id','=',$studentdata->class_id)
        ->where('rates.branch_id','=',$studentdata->branch_id)
        ->get(['rates.*'])->first();
        $add_cost = intval(str_replace(".", "", $request->add_cost));
        $total = ($pricedata->price*$request->meet_hours)+($pricedata->add_price*intval($request->extra_meet_hours/30))+$add_cost;
         //$response = $total;
         $response = array(
            "total"=>$total,
            "price"=>$pricedata->price,
            "add_price"=>$pricedata->add_price,
        );
         return $response;
     }
}
