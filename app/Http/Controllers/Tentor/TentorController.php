<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TentorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:tentor');
        view()->share('nav', 'dashboard');
        
    }

    public function dashboard()
    {
        $tentor_status = Auth::user()->account_status;

        if($tentor_status != 10){
            return view('tentor.pages.dashboard')->withErrors(
                [
                    'error' => 'Your account is inactive please contact admin to activate your account first!'
                ]
            );;
            
        }else{
            return view('tentor.pages.dashboard');
        };
        
    }
}