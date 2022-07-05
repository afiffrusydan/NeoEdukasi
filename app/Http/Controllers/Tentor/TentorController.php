<?php

namespace App\Http\Controllers\Tentor;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\TentorVerification;
use Illuminate\Support\Facades\Auth;
use App\Models\Tentor;
use App\Models\Bank;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TentorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:tentor']);
        view()->share('nav', 'dashboard');
        
    }

    public function dashboard()
    {
        $tentor_status = Auth::user()->account_verif_status;
        $tentor_id = Auth::user()->id;
        
        if($tentor_status == null){
            return view('tentor.pages.dashboard')->withErrors(
                [
                    'inactive' => 'Akun anda belum diverifikasi silahkan verifikasi akun anda terlebih dahulu.'
                ]
            );;
        }elseif($tentor_status == 0){
            return view('tentor.pages.dashboard')->withErrors(
                [
                    'msg' => 'Verifikasi akun anda sedang diproses oleh admin kami, silahkan tunggu'
                ]
            );;
        }elseif($tentor_status == -100){
            $status=TentorVerification::find($tentor_id);
            return view('tentor.pages.dashboard', ['reasons'=> $status])->withErrors(
                [
                    'inactive' => 'Verifikasi akun anda ditolak!',
                    'declinemsg' => 'Alasan'
                ]
            );;
        }elseif($tentor_status == 100){
            $files = Storage::files('public/files');
            $file=array();
            foreach ($files as $key => $value) {
                $value= basename($value);
                array_push($file,$value);
            }
            return view('tentor.pages.dashboard', ['images' => $file]);
        };
        
    }

    public function tentorsid_verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|min:16',
            'ktp' => 'required|mimes:jpeg,png,jpg,pdf',
            'ijazah' => 'required|mimes:pdf',
            'transkip' => 'required|mimes:pdf',
          ]);

          if ($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()->all()]);
          }else{
            $id = Auth::user()->id;

            $KTP_destinationPath = 'private/files/tentors/verification/'.$id.'/KTP';
            $ijazah_destinationPath = 'private/files/tentors/verification/'.$id.'/Ijazah';
            $transkip_destinationPath = 'private/files/tentors/verification/'.$id.'/Transkip';
            $ktp_file = $request->file('ktp');
            $ijazah_file = $request->file('ijazah');
            $transkip_file = $request->file('transkip');
            
            $ktp_filename = Auth::user()->token.".".$ktp_file->getClientOriginalExtension();
            $filename = Auth::user()->token.".pdf";

            $verification=TentorVerification::find($id);
            if($verification){
                $verification->ktp_file = $KTP_destinationPath.'/'.$ktp_filename;
                $verification->ijazah_file = $ijazah_destinationPath.'/'.$filename;
                $verification->transkip_file = $transkip_destinationPath.'/'.$filename;
                $verification->verification_status = 0;
                $verification->save();
            }else{
                TentorVerification::create([
                    'id' => $id,
                    'ktp_file' => $KTP_destinationPath.'/'.$ktp_filename,
                    'ijazah_file' => $ijazah_destinationPath.'/'.$filename,
                    'transkip_file' => $transkip_destinationPath.'/'.$filename,
                    'verification_status' => 0,
                ]);
            }
  
            $KTP_destinationPath_m = base_path('storage/app/private/files/tentors/verification/'.$id.'/KTP');
            $ijazah_destinationPath_m = base_path('storage/app/private/files/tentors/verification/'.$id.'/Ijazah');
            $transkip_destinationPath_m = base_path('storage/app/private/files/tentors/verification/'.$id.'/Transkip');
            
            $ktp_file->move($KTP_destinationPath_m,$ktp_filename);
            $ijazah_file->move($ijazah_destinationPath_m,$filename);
            $transkip_file->move($transkip_destinationPath_m,$filename);
            
            $tentor = Tentor::find($id);
            $tentor->NIK = $request->get('nik');
            $tentor->account_verif_status = 0;
            $tentor->save();
            return response()->json(['success'=>'Data is successfully added ']);
          }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $tentor = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('id', $id)->first(['tentors.*', 'branchs.branch_name']);

        $tentor_status = Auth::user()->account_status;

        if($tentor_status == -10){
            return view('tentor.pages.tentors.profile',['tentors'=>$tentor])->withErrors(
                [
                    'inactive' => 'Your account is inactive please verify your information first to activate your account!'
                ]
            );;
        }elseif($tentor_status == 0){
            return view('tentor.pages.tentors.profile',['tentors'=>$tentor])->withErrors(
                [
                    'msg' => 'Your account verification is in progress please wait while we verify'
                ]
            );;
        }else{
            return view('tentor.pages.tentors.profile',['tentors'=>$tentor]);
        };
        
    }

    public function updateProfile(Request $request)
    {

    }


    public static function getAge($dob)
    {
        $birthDate = explode("-", $dob);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));
        return $age;
    }
    public function bankaccount()
    {
        $id = Auth::user()->id;
        $banks= Bank::all();
        $bankAccount= Tentor::join('banks', 'tentors.bank_id', '=', 'banks.id')
        ->where('tentors.id','=', $id)
        ->get([ 'tentors.bank_account', 'banks.bank_name'])->first();;
        return view('tentor.pages.tentors.bankaccount',['banks'=>$banks, 'bankAccount'=>$bankAccount]);
    }

    public function checkbankaccount(Request $request)
    {
        $bankcode = Bank::where('id', $request->id)->get(['bank_code'])->pluck('bank_code')[0];;
        $banknumber = $request->number;
        $ch = curl_init();
        $secret_key = "JDJ5JDEzJFhabEdVdzlWcHd3cWhzRHguVFIwNWV1akphc1RkZkpqbDM4Q1liMlZVUThGNWMxMDY1VklT";
        
        curl_setopt($ch, CURLOPT_URL, "https://bigflip.id/api/v2/disbursement/bank-account-inquiry");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        
        curl_setopt($ch, CURLOPT_POST, TRUE);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, "account_number=".$banknumber."&bank_code=".$bankcode);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/x-www-form-urlencoded"
        ));
        
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");
        
        $response = curl_exec($ch);
        curl_close($ch);;
        return $response;
    }

    public function bankUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $tentor = Tentor::find($id);
        
        $tentor->bank_id = $request->id; 
        $tentor->bank_account = $request->number;
        $tentor->save();

        $response="Bank Account Successfully Updated";
        return $response;
    }

    function getFile($filename){
        return Storage::download('public/files/'.$filename);
    }
}
