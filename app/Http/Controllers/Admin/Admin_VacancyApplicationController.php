<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\admin\Vacancy;
use App\Models\Tentor;
use App\Models\admin\TutoredStudents;
use App\Models\tentor\TentorApplication;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class Admin_VacancyApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        ->where('vacancy.status','=', -10)
        ->get(['vacancy.*', 'students.first_name','students.last_name'])->sortByDesc("created_at");;
        return view('admin.pages.vacancy-application.index', ['vacancys' => $vacancy]);
    }

    public function show($id)
    {
        $vacancy = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->get([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name']);;
        return view('admin.pages.vacancy-application.application-list', ['vacancy' => $vacancy]);
    }

    public function detail($appId)
    {
        $data = TentorApplication::find($appId);
        $tentorDetail = Tentor::find($data->tentor_id);
        $vacancyDetail = Vacancy::find($data->vacancy_id);
        $studentDetail = Student::find($vacancyDetail->student_id);
        $interviewStatus = $this->interviewCheck($data->tentor_id);
        return view('admin.pages.vacancy-application.applicant-detail', ['data' => $data,'tentorData' => $tentorDetail,'vacancyData' => $vacancyDetail,'studentData' => $studentDetail,'interviewStatus'=>$interviewStatus]);
    }
    private function interviewCheck($id){
        $datacheck = TentorApplication::where('tentor_id','=',$id)
        ->where('status','=','100')
        ->orWhere('status','=','50')
        ->get(['status']);;
        if(count($datacheck) != 0){
            return "1";
        }else{
            return "0";
        }
    }
    public function decline(Request $request)
    {
        $id = $request->id; 
        $appData = TentorApplication::find($id);
        if($appData){
            $appData->status = -100;
            $appData->save();
        }

        $response="Application Status Successfully Updated ";
        return $response;
    }
    public function accept(Request $request)
    {
        $id = $request->id; 
        $appData = TentorApplication::find($id);
        if($appData){
            $appData->status = 100;
            $appData->save();
        }
        $tentor = Tentor::find($appData->tentor_id);

        $vacancy = Vacancy::find($appData->vacancy_id);
        TutoredStudents::create([
            'tentor_id'=>$appData->tentor_id,
            'student_id'=>$vacancy->student_id,
            'subject'=>$vacancy->subject,
            'status' => 0,
        ]);
        Vacancy::where('id', $appData->vacancy_id)->delete();
        // TentorApplication::where('vacancy_id', $appData->vacancy_id)->delete();
        if($tentor){
            $tentor->account_status=100;
            $tentor->save();
        }
        $response="Application Status Successfully Updated";
        return $response;
    }
    public function inviteInterview(Request $request)
    {
        $id = $request->id; 
        $appData = TentorApplication::find($id);
        if($appData){
            $appData->status = 10;
            $appData->save();
        }
        $tentor = Tentor::find($appData->tentor_id);
        if($tentor){
            $tentorname = $tentor->first_name.' '.$tentor->last_name;
            $tentoremail = $tentor->email;
            $data = array('name'=>$tentorname);
            Mail::send('emails.interviewInvite-mail', $data, function($message) use ($tentorname, $tentoremail) {
                $message->to($tentoremail, $tentorname)
                ->subject('Interview Invitation');
                $message->from('noreply.neoedukasi@gmail.com','Neo Edukasi');
                });
        }
        
        $response="Application Status Successfully Updated";
        return $response;
    }
}
