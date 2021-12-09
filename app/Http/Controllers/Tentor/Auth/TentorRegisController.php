<?php
  
  namespace App\Http\Controllers\Tentor\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Tentor;
use Hash;
  
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
        return view('tentor.auth.register');
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
          'NIK' => ['required', 'integer','unique:tentors', 'max:16', 'min:16'],
          'email' => ['required', 'string','email', 'unique:tentors', 'max:255'],
          'phone_number' => ['required', 'integer', 'unique:tentors', 'max:255'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'address' => ['required', 'string','max:255'],
          'pob' => ['required', 'string', 'max:255'],
          'dob' => ['required', 'string', 'max:255'],
          'religion' => ['required', 'string', 'max:255'],
          'gender' => ['required', 'string', 'max:255'],
          'job_status' => ['required', 'string', 'max:255'],
          'last_education' => ['required', 'string', 'max:255'],
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->route('tentor.login')->with('msg', 'Sucsesfully create your account.');
    }
    
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return Tentor::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'NIK' => $data['NIK'],
        'email' => $data['email'],
        'phone_number' => $data['phone_number'],
        'password' => Hash::make($data['password']),
        'address' => $data['address'],
        'POB' => $data['pob'],
        'DOB' => $data['dob'],
        'religion' => $data['religion'],
        'gender' => $data['gender'],
        'job_status' => $data['job_status'],
        'last_education' => $data['last_education'],
        'account_status'=> "-10",
      ]);
    }
}