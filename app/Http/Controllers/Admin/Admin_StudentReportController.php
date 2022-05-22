<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\TutoredStudents;
use App\Models\tentor\SalarySubmission;
use App\Models\tentor\StudentProgress;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class Admin_StudentReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $stdProgress = TutoredStudents::join('students', 'tutored-students.student_id', '=', 'students.id') 
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        ->join('branchs', 'students.branch_id', '=', 'branchs.branch_id')
        ->select('tutored-students.id','tutored-students.subject','students.first_name as stdFirstName', 'students.last_name as stdLastName','branchs.branch_name')
        ->get()->sortByDesc("tutored-students.id");;

        return view('admin.pages.student-report.student-progress.index', ['datas' => $stdProgress]);
    }

    public function view($id)
    {
        $studentProgress = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id')  
        ->join('students','tutored-students.student_id','=','students.id')
        ->where('students_progress.tentored_student_id','=', $id)
        ->join('tentors', 'tutored-students.tentor_id', '=', 'tentors.id') 
        // ->where('students_progress.status','=',10)
        ->select('students_progress.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName','tentors.first_name as tntrFirstName', 'tentors.last_name as tntrLastName')
        ->get();
        return view('admin.pages.student-report.student-progress.view', ['data' => $studentProgress]);
    }

    public function detail($id)
    {


        $studentProgress = StudentProgress::join('tutored-students', 'tutored-students.id', '=', 'students_progress.tentored_student_id')  
        ->join('students','tutored-students.student_id','=','students.id')
        ->join('tentors','tutored-students.tentor_id','=','tentors.id')
        ->where('students_progress.id','=', $id)
        ->select('students_progress.created_at as date','students.*','students_progress.*','tutored-students.subject','students.id as stdId','students.first_name as stdFirstName', 'students.last_name as stdLastName','tentors.first_name as tntrFirstName', 'tentors.last_name as tntrLastName',(DB::raw('YEAR(month) year,MONTH(month) onlymonth')))
        ->get()->first();;
        $bulan = array (
            1 =>   	'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
            );
        $month_name =  $bulan[ (int)$studentProgress->onlymonth];
        $data = [
            'student_name' =>   $studentProgress->stdFirstName.' '.$studentProgress->stdLastName,
            'class' => $studentProgress->class,
            'school' => $studentProgress->school,
            'curriculum' => $studentProgress->curriculum,
            'subject' => $studentProgress->subject,
            'tentor_name' =>  $studentProgress->tntrFirstName.' '.$studentProgress->tntrLastName,
            'study_target' => $studentProgress->study_target,
            'study_method' => $studentProgress->study_method,
            'learning_progression' => $studentProgress->learning_progression,
            'feedback' => $studentProgress->feedback,
            'date' => $studentProgress->date,
            'month' => $month_name,
            'year' => $studentProgress->year,
        ];
          
        $path = public_path('pdf');
        $filename ='Laporan_Perkembangan_Siswa';
        // $pdf = PDF::loadView('template.student-progress', $data);
        
        $pdf = PDF::loadView('template.student-progress', $data)->save(''.$path.'/'.$filename.'.pdf');

        // Storage::put('public/invoice.pdf', $pdf->output());

        $key='866cb2bb28d0f410fedb3893178aa25fafc211e6b8456541'; //this is demo key please change with your own key
        $url='http://116.203.191.58/api/send_file_url';
        $file_path = asset('pdf/'.$filename);
        $data = array(
          "phone_no"  => '+'.$studentProgress->parent_phone_number,
          "key"       => $key,
          "url"       => $file_path
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
            'Content-Length: ' . strlen($data_string),
            'Authorization: Basic dXNtYW5ydWJpYW50b3JvcW9kcnFvZHJiZWV3b293YToyNjM3NmVkeXV3OWUwcmkzNDl1ZA=='
        ));
        echo $res=curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}
