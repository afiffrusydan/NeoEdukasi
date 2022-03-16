<?php
namespace Database\Seeders;
use App\Models\Branch;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{

    public function run()
    {
        for($i=1;$i<=12;$i++){
            Branch::create([
                'branch_id' => $i,
                'branch_name' => "Sedunia",
            ]);
        }
    }
}