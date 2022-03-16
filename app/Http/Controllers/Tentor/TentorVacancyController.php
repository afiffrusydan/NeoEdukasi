<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Vacancy;
use App\Models\tentor\TentorApplication;
use RealRashid\SweetAlert\Facades\Alert;

class TentorVacancyController extends Controller
{
    public function index()
    {
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        ->where('vacancy.status','=','-10')
        ->get(['vacancy.id as vacancyId', 'students.*', 'vacancy.*'])->sortByDesc("updated_at");
        return view('tentor.pages.vacancy.index', ['vacancys' => $vacancy]);
    }

    public function view($id)
    {
        $vacancy = Vacancy::join('students', 'vacancy.student_id', '=', 'students.id')
        ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->where('vacancy.id','=', $id)
        ->get([ 'vacancy.created_at as vacancyCreateDate', 'vacancy.status as vacancyStatus','vacancy.id as vacancyId', 'vacancy.*', 'students.*','branchs.*'])->first();;
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


    public function submitApplication($id)
    {
        TentorApplication::create([
            'tentor_id' => Auth::user()->id,
            'vacancy_id' => $id,
            'status' => -10,
        ]);

        
        Alert::success('Success', 'Your job application successfully submitted!');
        return redirect()->route('tentor.vacancy.index', ['id'=>$id]);
    }
}
