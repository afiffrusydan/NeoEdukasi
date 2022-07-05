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
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use DataTables;

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
        ->Orwhere('vacancy.status','=', 10)
        ->get(['vacancy.*', 'students.first_name','students.last_name'])->sortByDesc("created_at");;
            return view('admin.pages.vacancy-application.index', ['vacancys' => $vacancy]);
        
    }
    public function cs_index()
    {
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        // ->join('tentors-application','tentors-application.vacancy_id','=','vacancy.id')
        // ->where('tentors-application.status','=', 50)
        ->where('vacancy.status','=', -10)
        ->Orwhere('vacancy.status','=', 10)
        ->get(['vacancy.*', 'students.first_name','students.last_name'])->sortByDesc("created_at");;

            return view('admin.pages.cs-vacancy-application.index', ['vacancys' => $vacancy]);
        
    }

    public function show(Request $request, $id)
    {
        $branchs = Branch::all();
        $vacancy = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->where('tentors-application.status','!=',50)
        ->where('tentors-application.status','!=',100)
        ->get([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name']);;

        $shortlistvacancy = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->where('tentors-application.status','=', 50)
        ->get([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name','tentors.phone_number']);;
        if ($request->ajax()) {
            if($request->get('type') == "applicant-list"){
                $data = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
                ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
                ->where('tentors-application.vacancy_id','=', $id)
                ->where('tentors-application.status','!=', 50)
                ->select([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name'])->orderBy('tentors.account_status','DESC');
            }elseif($request->get('type') == "selected-applicant-list"){
                $data = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
            ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
            ->where('tentors-application.vacancy_id','=', $id)
            ->where('tentors-application.status','=', 50)
            ->select([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name'])->orderBy('tentors.account_status','DESC');
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('full_name', function($row){
                        $btn = '<a href="'.route('admin.vacancy.vacancy-application.detail', ['id' => $row->appId]).'">'.$row->first_name.' '.$row->last_name.'</a>';
                        return $btn;
                    })
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.route('admin.vacancy.vacancy-application.detail', ['id' => $row->appId]).'" class="btn btn-sm btn-neo ">Detail</a>';
    
                            return $btn;
                    })
                    ->addColumn('status', function($row){
                    if ($row->status == 50){
                        return '<span class="span1 d-inline-block py-1 px-4 bg-info-light text-info fs-sm btn-block">Terpilih</span>';
                    }elseif($row->status == -100){
                        return '<span class="span1 d-inline-block py-1 px-3 bg-danger-light text-danger fs-sm btn-block">Ditolak</span>';
                        }else{
                        return '<span class="span1 d-inline-block py-1 px-3 bg-warning-light text-warning fs-sm btn-block">Submit</span>';
                        }
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == '0' || $request->get('status') == '50' || $request->get('status') == '-100' || $request->get('status') == '-10') {
                            $instance->where('tentors-application.status',$request->get('status'));
                        }
                        if (!empty($request->get('branch'))) {
                            $instance->where('tentors.branch_id', '=',$request->get('branch'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                               $search = $request->get('search');
                               $w->orWhere('tentors.first_name', 'LIKE', "%$search%")
                               ->orWhere('tentors.last_name', 'LIKE', "%$search%")
                               ->orWhere('branch_name', 'LIKE', "%$search%");
                           });
                       }
                    })

                    ->rawColumns(['action','status','full_name','tentor_name'])
                    ->make(true);
        }
        
        return view('admin.pages.vacancy-application.application-list2',['vacancy' => $vacancy, 'shortlist' => $shortlistvacancy,'branchs'=>$branchs,'id'=>$id]);
    }
    public function cs_show($id)
    {
        $shortlistvacancy = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->where('tentors-application.status','=', 50)
        ->get([ 'tentors-application.id as appId','tentors-application.status', 'tentors-application.tentor_id as tentorId','tentors.first_name', 'tentors.last_name', 'tentors.last_education','tentors.job_status','branchs.branch_name','tentors.phone_number']);;
        return view('admin.pages.cs-vacancy-application.application-list', ['vacancy' => $shortlistvacancy, 'shortlist' => $shortlistvacancy,'id'=>$id]);
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
    public function cs_detail($appId)
    {
        $data = TentorApplication::find($appId);
        $tentorDetail = Tentor::find($data->tentor_id);
        $vacancyDetail = Vacancy::find($data->vacancy_id);
        $studentDetail = Student::find($vacancyDetail->student_id);
        $interviewStatus = $this->interviewCheck($data->tentor_id);
        return view('admin.pages.cs-vacancy-application.applicant-detail', ['data' => $data,'tentorData' => $tentorDetail,'vacancyData' => $vacancyDetail,'studentData' => $studentDetail,'interviewStatus'=>$interviewStatus]);
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
    public function addToShortlist(Request $request)
    {
        $id = $request->id; 
        $appData = TentorApplication::find($id);
        if($appData){
            $appData->status = 50;
            $appData->save();
        }

        $response="Application Status Successfully Updated ";
        return $response;
    }
    public function removeFromShortlist(Request $request)
    {
        $id = $request->id; 
        $appData = TentorApplication::find($id);
        if($appData){
            $appData->status = -10;
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
            'status' => 100,
        ]);
        Vacancy::where('id', $appData->vacancy_id)->delete();
        // TentorApplication::where('vacancy_id', $appData->vacancy_id)->delete();
        if($tentor->account_status == 50 or $tentor->account_status == 100){
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
