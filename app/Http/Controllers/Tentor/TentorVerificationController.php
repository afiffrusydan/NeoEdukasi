<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\TentorVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Tentor;
use App\Models\admin\Vacancy;
use App\Models\Bank;
use App\Models\tentor\FileVerification;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TentorVerificationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:tentor']);
    }

    public function verify(){
        return view('tentor.pages.verification.index');
    }
}
