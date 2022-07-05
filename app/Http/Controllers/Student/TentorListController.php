<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\tentor\TentorApplication;
use PhpParser\Node\Expr\FuncCall;

class TentorListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($_id)
    {
        $id = Crypt::decryptString($_id);
        $tentors = TentorApplication::join('tentors', 'tentors-application.tentor_id', '=', 'tentors.id')
        ->join('branchs', 'branchs.branch_id', '=', 'tentors.branch_id')
        ->where('tentors-application.vacancy_id','=', $id)
        ->where('tentors-application.status','=', 50)
        ->get([ 'tentors-application.id as appId', 'tentors.*']);;
        return view('student..pages.tentor-list.index', ['tentorlist'=>$tentors]);
    }
}
