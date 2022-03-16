<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use App\Models\admin\TentorVerification;
use App\Models\Student;
use App\Models\Tentor;
use App\Models\tentor\FileVerification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class Admin_TentorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function tentor_verification()
    {
        $tentor = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('account_status', 0)->get(['tentors.id','tentors.first_name' ,'tentors.last_name','tentors.last_education','tentors.email', 'branchs.branch_name']);

        $tentor1 = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('account_status', 5)->get(['tentors.id','tentors.first_name' ,'tentors.last_name','tentors.last_education','tentors.email', 'branchs.branch_name']);
        return view('admin.pages.tentor-verification.index', ['tentors' => $tentor, 'oldtentors' => $tentor1]);
    }

    public function tentor_verification_detail($id)
    {
        $tentor = Tentor::join('branchs', 'tentors.branch_id', '=', 'branchs.branch_id')
        ->where('id', $id)->first(['tentors.*', 'branchs.branch_name']);

        $tentor_file = FileVerification::find($id);
        return  View::make('admin.pages.tentor-verification.show', ['tentorData' => $tentor, 'tentorsFile'=>$tentor_file]);
    }
    
    public function tentor_ktp_get($id)
    {
        $document = FileVerification::findOrFail($id);

        $filePath = $document->ktp_file;

        $pdfContent = Storage::path($filePath);


        return response()->file($pdfContent);
    }
    
    public function tentor_ijazah_get($id)
    {
        $document = FileVerification::findOrFail($id);

        $filePath = $document->ijazah_file;

        $pdfContent = Storage::path($filePath);


        return response()->file($pdfContent);
    }
    
    public function tentor_transkip_get($id)
    {
        $document = FileVerification::findOrFail($id);

        $filePath = $document->transkip_file;

        $pdfContent = Storage::path($filePath);
        $type       = Storage::mimeType($filePath);

        return response()->file($pdfContent);
    }


    public function verificationSubmit(Request $request)
    {
        if($request->ktp_status == 1 && $request->ijazah_status==1 && $request->ijazah_status==1 ){
            $tentorverif = TentorVerification::find($request->id);
            if($tentorverif){
                $tentorverif->ktp_status=$request->ktp_status;
                $tentorverif->ijazah_status=$request->ijazah_status;
                $tentorverif->transkip_status=$request->transkip_status;
                $tentorverif->ktp_decline_reason=$request->ktp_declinereason;
                $tentorverif->ijazah_decline_reason=$request->ijazah_declinereason;
                $tentorverif->transkip_decline_reason=$request->transkip_declinereason;
                $tentorverif->verification_status= 10;
                $tentorverif->save();
                $tentor = Tentor::find($request->id);
                $tentor->account_status = "10";
                $tentor->save();
            }else{
                TentorVerification::create([
                    'id'=>$request->id,
                    'ktp_status'=>$request->ktp_status,
                    'ijazah_status'=>$request->ijazah_status,
                    'transkip_status'=>$request->transkip_status,
                    'ktp_decline_reason'=>$request->ktp_declinereason,
                    'ijazah_decline_reason'=>$request->ijazah_declinereason,
                    'transkip_decline_reason'=>$request->transkip_declinereason,
                    'verification_status'=> 10,
                ]);
                
                $tentor = Tentor::find($request->id);
                $tentor->account_status = "10";
                $tentor->save();
            }
        }else{
            $tentorverif = TentorVerification::find($request->id);
            if($tentorverif){
                $tentorverif->ktp_status=$request->ktp_status;
                $tentorverif->ijazah_status=$request->ijazah_status;
                $tentorverif->transkip_status=$request->transkip_status;
                $tentorverif->ktp_decline_reason=$request->ktp_declinereason;
                $tentorverif->ijazah_decline_reason=$request->ijazah_declinereason;
                $tentorverif->transkip_decline_reason=$request->transkip_declinereason;
                $tentorverif->verification_status= -10;
                $tentorverif->save();


                $tentor = Tentor::find($request->id);
                $tentor->account_status = "-5";
                $tentor->save();
            }else{
                TentorVerification::create([
                    'id'=>$request->id,
                    'ktp_status'=>$request->ktp_status,
                    'ijazah_status'=>$request->ijazah_status,
                    'transkip_status'=>$request->transkip_status,
                    'ktp_decline_reason'=>$request->ktp_declinereason,
                    'ijazah_decline_reason'=>$request->ijazah_declinereason,
                    'transkip_decline_reason'=>$request->transkip_declinereason,
                    'verification_status'=> 10,
                ]);
                
                $tentor = Tentor::find($request->id);
                $tentor->account_status = "-5";
                $tentor->save();
            }
        }
        Alert::success('Success', 'Tentor account status successfully updated!');
        return redirect()->route('admin.tentor.verification');
    }
}
