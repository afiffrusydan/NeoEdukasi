<?php
namespace Database\Seeders;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class siswaseeder extends Seeder
{

    public function run()
    {
        for($i=0;$i<=100;$i++){
            Student::create([
                'first_name' => "Udin",
                'last_name' => "Sedunia".$i,
                'email' => "Udinsedunia".$i."@gmail.com",
                'account_status' => 10,
                'password' => bcrypt("123123"),
            ]);
        }
    }

}