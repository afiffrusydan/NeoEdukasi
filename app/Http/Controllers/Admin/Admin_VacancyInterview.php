<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\admin\TutoredStudents;
use App\Models\admin\Vacancy;
use App\Models\Tentor;
use App\Models\tentor\TentorApplication;
use App\Models\tentor\FileVerification;
use Database\Seeders\tentorseeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class Admin_VacancyInterview extends Controller
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
        return view('admin.pages.interview.index', ['vacancys' => $vacancy]);
    }

    public function show($id)
    {
        $vacancy = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->where('tentors-application.status','=', 10)
        ->orWhere('tentors-application.status','=', 0)
        ->get([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name','tentors.phone_number']);;

        $shortlistvacancy = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->where('tentors-application.status','=', 50)
        ->get([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name','tentors.phone_number']);;

        return view('admin.pages.interview.interview-list', ['vacancy' => $vacancy, 'shortlist' => $shortlistvacancy]);
    }

    public function detail($appId)
    {
        $data = TentorApplication::find($appId);
        
        $tentorDetail = Tentor::join('banks', 'banks.id','=','tentors.bank_id')
        ->join('branchs','branchs.branch_id','=','tentors.branch_id')
        ->where('tentors.id','=', $data->tentor_id)
        ->get([ 'tentors.*', 'banks.bank_name','branchs.branch_name'])->first();;
        $interviewStatus = $this->interviewCheck($data->tentor_id);
        $vacancyDetail = Vacancy::find($data->vacancy_id);
        $studentDetail = Student::find($vacancyDetail->student_id);
        return view('admin.pages.interview.show', ['data' => $data,'tentorData' => $tentorDetail,'vacancyData' => $vacancyDetail,'studentData' => $studentDetail,'interviewStatus'=>$interviewStatus]);
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

    public function tentor_ijazah_get($id)
    {
        $document = FileVerification::findOrFail($id);

        $filePath = $document->ijazah_file;

        $pdfContent = Storage::path($filePath);


        return response()->file($pdfContent);
    }

    public function tentor_transkip_get($id)
    {
        $document = FileVerification::findOrFail($id);

        $filePath = $document->transkip_file;

        $pdfContent = Storage::path($filePath);
        $type       = Storage::mimeType($filePath);

        return response()->file($pdfContent);
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


    public function shortlist(Request $request)
    {
        $id = $request->id; 
        $appData = TentorApplication::find($id);
        if($appData){
            $appData->status = 50;
            $appData->save();
        }

        $response="Application Status Successfully Updated";
        return $response;
    }

    public static function getApplicant($id)
    {
        $applicant=TentorApplication::where('vacancy_id','=',$id)
        ->where('status','>=', 0)
        ->where('status','<', 100)
        ->get();
        $sum=count($applicant);
        return $sum;
    }

}
