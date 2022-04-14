<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\TutoredStudents;
use App\Models\Branch;
use App\Models\Student;
use App\Models\admin\Vacancy;
use App\Models\ClassModel;
use App\Models\Tentor;
use App\Models\tentor\SalarySubmission;
use App\Models\tentor\StudentProgress;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use PDF;

class WhatsappController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function salaryUpdate($id){
        $salaryData = SalarySubmission::find($id);
        if($salaryData){
            $tentorData = Tentor::join('tutored-students','tutored-students.tentor_id','=','tentors.id')
            ->where('tutored-students.id','=',$salaryData->tentored_student_id)
            ->get(['tentors.*'])->first();;

            $studentdata = TutoredStudents::join('students','students.id','=','tutored-students.student_id')
            ->where('tutored-students.id','=',$salaryData->tentored_student_id)
            ->get(['students.branch_id','students.class_id'])->first();
    
           $ratesdata = ClassModel::join('rates','rates.category','=','class.category')
           ->where('class.id','=',$studentdata->class_id)
           ->where('rates.branch_id','=',$studentdata->branch_id)
           ->get(['rates.price','rates.add_price'])->first();

            $key='866cb2bb28d0f410fedb3893178aa25fafc211e6b8456541'; //this is demo key please change with your own key
            $url='http://116.203.191.58/api/send_message';
            $data = array(
            "phone_no"  => '+'.$tentorData->phone_number,
            "key"       => $key,
            "message"   => "Sallary Submission \nYour Sallary Submission Updated By Admin. \n"
            .$salaryData->meet_hours." x ".$ratesdata->price."\n"
            .intval($salaryData->extra_meet_hours/30)." x ".$ratesdata->add_price."\n"
            .$salaryData->add_cost."\n"
            .$salaryData->total."\n",
            "skip_link" => True // This optional for skip snapshot of link in message
            );
            $data_string = json_encode($data);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 360);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
            );
            echo $res=curl_exec($ch);
            curl_close($ch);
        }
    }
}
