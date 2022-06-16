<?php
  
namespace App\Http\Controllers\Tentor\Auth;
  
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Tentor;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
  
class TentorRegisController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        $branchs = Branch::all();
        return view('tentor.auth.register',  ['branchs' => $branchs]);
    }
      
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
          'first_name' => ['required', 'string', 'max:255'],
          'last_name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string','email', 'unique:tentors', 'max:255'],
          'phone_number' => ['required', 'numeric', 'unique:tentors', 'digits_between:10,13'],
          'password' => ['required', 'string', 'min:8'],
          'branch' => ['required', 'numeric'],
          'address' => ['required', 'string','max:255'],
          'pob' => ['required', 'string', 'max:255'],
          'dob' => ['required', 'string', 'max:255'],
          'religion' => ['required', 'string', 'max:255'],
          'gender' => ['required', 'string', 'max:255'],
          'job_status' => ['required', 'string', 'max:255'],
          'last_education' => ['required', 'string', 'max:255'],
        ]);


        $token = Str::random(64);
        $data = $request->all();
        $check = $this->create($data,$token);
         
        
        $to_name = $data['first_name']." ".$data['last_name'];
        $to_email = $data['email'];
        $data = array('name'=>$to_name, "token" => $token);
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Email Account Verification');
        $message->from('noreply.neoedukasi@gmail.com','Neo Edukasi');
        });

        return redirect()->route('tentor.login')->with('msg', 'Akun Berhasil dibuat. Silahkan cek email anda untuk verifikasi email akun anda.');
    }
    
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data, $token)
    {
      if($data['job_status'] == 'other'){
        $data['job_status']= $data['other_job_status'];
      };
      if (substr($data['phone_number'], 0, 1) === '0') { 
            $phone_number = substr($data['phone_number'],1);
            $phone_number = '62'.$phone_number;
      }else{
          $phone_number = $data['phone_number'];
      }
      return Tentor::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'phone_number' => $phone_number,
        'password' => Hash::make($data['password']),
        'branch_id' => $data['branch'],
        'address' => $data['address'],
        'POB' => $data['pob'],
        'DOB' => $data['dob'],
        'religion' => $data['religion'],
        'gender' => $data['gender'],
        'job_status' => $data['job_status'],
        'token'=>$token,
        'last_education' => $data['last_education']." - ".$data['education_major'],
        'account_status'=> "-50",
        'account_verif_status'=> "0",
      ]);
    }


    public function verifyAccount($token)
    {
      $verifyUser = Tentor::firstOrNew(array('token' => $token));
      $message = 'Sorry your email cannot be identified.';
      date_default_timezone_set('Asia/Jakarta');
      $date = date('Y-m-d H:i:s');

      if(!is_null($verifyUser) ){
          $verified_status = $verifyUser->email_verified_at;
          if(is_null($verified_status)) {
              $verifyUser->email_verified_at = $date;
              $verifyUser->save();
              $message = "Email berhasil diverifikasi. Silahkan login.";
          } else {
              $message = "Email berhasil diverifikasi. Silahkan login.";
          }
      }
      return redirect()->route('tentor.login')->with('msg', $message);
    }
}
