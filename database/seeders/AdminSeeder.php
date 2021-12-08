<?php
namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        foreach (config('project.admin.roles') as $role) {
            Role::firstOrCreate([
                'guard_name' => 'admin',
                'name' => $role
            ]);
        };

        $admins = [
            [
                'role' => 'administrator',
                'first_name' => 'Wisnu',
                'last_name' => 'Maulana',
                'email' => 'administrator@gmail.com',
                'password' => '123123',
            ],
            [
                'role' => 'academic',
                'first_name' => 'Rochimah',
                'last_name' => 'Dyah',
                'email' => 'academic@gmail.com',
                'password' => '123123',
            ],
            [
                'role' => 'customerservice',
                'first_name' => 'Shidiq',
                'last_name' => 'Arif',
                'email' => 'customer@gmail.com',
                'password' => '123123',
            ],
        ];

        foreach ($admins as $admin) {
            $exist = Admin::where('email', $admin['email'])->first();
            if(empty($exist)){
                $super_admin = Admin::firstOrCreate([
                    'first_name' => $admin['first_name'],
                    'last_name' => $admin['last_name'],
                    'email' => $admin['email'],
                    'password' => bcrypt($admin['password']),
                ]);
                $super_admin->assignRole($admin['role']);
            }
        }
    }
}