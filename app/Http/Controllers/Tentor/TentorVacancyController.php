<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Vacancy;
use App\Models\tentor\TentorApplication;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

class TentorVacancyController extends Controller
{
    public function index()
    {
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        ->join('branchs','branchs.branch_id','=','students.branch_id')
        ->where('vacancy.status','=','-10')
        ->where('students.branch_id','=',Auth::user()->branch_id)
        ->orWhere('students.branch_id','=',11)
        ->get(['vacancy.id as vacancyId', 'students.*', 'vacancy.*','branch_name'])->sortByDesc("updated_at");
        return view('tentor.pages.vacancy.index2', ['vacancys' => $vacancy]);
    }

    public function view($_id)
    {
        $id = Crypt::decrypt($_id);
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->join('class', 'students.class_id', '=', 'class.id')
        ->where('vacancy.id','=', $id)
        ->get([ 'vacancy.created_at as vacancyCreateDate', 'vacancy.status as vacancyStatus','vacancy.id as vacancyId', 'vacancy.*', 'students.*','branchs.*','class.class'])->first();;
        $userid=Auth::user()->id;
        $checkAplly = TentorApplication::where('tentor_id', '=', $userid)->where('vacancy_id', $id)->first();
        if($checkAplly){
            $status = 'applied';        
        }else{
            $status= '';
        }
        if($vacancy->status== -10){
            $jobStatus= 'Open';
        }else{
            $jobStatus= 'Closed';
        }
        return view('tentor.pages.vacancy.view', ['vacancy' => $vacancy, 'statusApplication'=>$status, 'jobStatus'=> $jobStatus]);
    }


    public function submitApplication($_id)
    {
        $id = Crypt::decrypt($_id);
        TentorApplication::create([
            'tentor_id' => Auth::user()->id,
            'vacancy_id' => $id,
            'status' => -10,
        ]);

        
        Alert::success('Success', 'Your job application successfully submitted!');
        return redirect()->route('tentor.vacancy.index', ['id'=>$id]);
    }
}
