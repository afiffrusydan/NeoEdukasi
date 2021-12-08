<?php
namespace Database\Seeders;
use App\Models\Student;
use App\Models\Tentor;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class tentorseeder extends Seeder
{

    public function run()
    {
        for($i=0;$i<=10;$i++){
            Tentor::create([
                'first_name' => "Tentor",
                'last_name' => "Udin".$i,
                'email' => "tentor".$i."@gmail.com",
                'account_status' => 10,
                'password' => bcrypt("123123"),
            ]);
        }
    }

}