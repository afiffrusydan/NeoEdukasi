<?php

namespace App\Http\Controllers\Tentor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TentorAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->redirectTo = config('project.tentor.prefix') . '/dashboard';
        $this->middleware('guest:tentor')->except('postLogout');
    }

    public function getLogin()
    {
        return view('tentor.auth.login');
    }

    public function register()
    {
        return view('tentor.auth.register');
    }

    public function postLogin(Request $request)
    {
        $data= $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);


        if (auth()->guard('tentor')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                $request->session()->regenerate();
                $this->clearLoginAttempts($request);
                return redirect()->route('tentor.dashboard');
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()->route('tentor.login')->with('errormsg', 'your username and password are wrong.');
        }
    }

    public function postLogout()
    {
        auth()->guard('tentor')->logout();
        session()->flush();

        return redirect()->route('tentor.login');
    }
}
