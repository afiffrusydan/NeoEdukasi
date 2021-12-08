<?php
namespace Database\Seeders;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{

    public function run()
    {
        Student::create([
            'first_name' => config('project.seed.dev_first_name'),
            'last_name' => config('project.seed.dev_last_name'),
            'email' => config('project.seed.dev_email'),
            'account_status' => 10,
            'password' => bcrypt(config('project.seed.dev_password')),
        ]);
    }

}