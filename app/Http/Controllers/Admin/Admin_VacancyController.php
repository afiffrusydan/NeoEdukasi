<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\admin\Vacancy;
use App\Models\tentor\TentorApplication;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Admin_VacancyController extends Controller
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

        return view('admin.pages.vacancy.index', ['vacancys' => $vacancy]);
    }

    public function create1()
    {
        //$student = Student::all()->sortByDesc("created_at");;
        $student = Student::join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->get(['students.*', 'branchs.branch_name']);
        return view('admin.pages.vacancy.create1', ['students' => $student]);
    }
    public function create2($id)
    {
        $student = Student::find($id);
        return view('admin.pages.vacancy.create2', ['students' => $student]);
    }

    public function submit(Request $request)
    {
        $criteria="";
        $request->validate([
            'subject' => 'required',
            'addMoreInputFields.*.criteria' => 'required'
        ]);
        foreach ($request->criteria as $key => $value) {
            if ($key == 0) {
                $criteria .= $value;
            } else {
                $criteria .= "~".$value;
            }
        }
        
        Vacancy::create([
            'student_id'=>$request->id,
            'subject'=>$request->subject,
            'criteria'=>$criteria,
            'status' => -10,
        ]);
        
        Alert::success('Success', 'Vacancy successfully added!');
        return redirect()->route('admin.vacancy.job-vacancy.index');
    }

    public function show($id)
    {
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->where('vacancy.id','=', $id)
        ->get([ 'vacancy.created_at as vacancyCreateDate', 'vacancy.status as vacancyStatus', 'vacancy.id as vacancyId','vacancy.*', 'students.*','branchs.*'])->first();;
        if($vacancy->vacancyStatus== -10){
            $jobStatus= 'Open';
        }else{
            $jobStatus= 'Closed';
        }
        $criteria = explode('~', $vacancy->criteria);
        $result1 = count($criteria)-1;
        return view('admin.pages.vacancy.view', ['vacancy' => $vacancy, 'criteria'=> $result1,'jobStatus'=>$jobStatus]);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $vacancy = Vacancy::find($id);
        
        $vacancy->status = $request->status;
        $vacancy->save();

        $response="Vacancy Status Successfully Updated";
        return $response;
    }


    public function update(Request $request)
    {
        $criteria="";
        $request->validate([
            'subject' => 'required',
            'addMoreInputFields.*.criteria' => 'required'
        ]);
        foreach ($request->criteria as $key => $value) {
            if ($key == 0) {
                $criteria .= $value;
            } else {
                $criteria .= "~".$value;
            }
        }
        
        $vacancy= Vacancy::find($request->id);
        
        $vacancy->subject = $request->subject;
        $vacancy->criteria = $criteria;
        $vacancy->save();
        
        Alert::success('Success', 'Vacancy successfully Updated!');
        return redirect()->route('admin.vacancy.job-vacancy.show', ['id'=>$request->id]);
    }

    public function remove(Request $request)
    {
        $id = $request->id; 
        Vacancy::where('id', $id)->delete();
        $response="Vacancy Record Successfully Deleted ";
        return $response;
    }

    public static function getApplicant($id)
    {
        $applicant=TentorApplication::where('vacancy_id','=',$id)->get();
        $sum=count($applicant);
        return $sum;
    }
}
