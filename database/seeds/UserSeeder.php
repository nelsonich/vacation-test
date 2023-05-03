<?php

use App\Models\RBAC\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::where('name', Role::SUPER_ADMIN)->first();
        $employee = Role::where('name', Role::EMPLOYEE)->first();

        User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin2023!'),
            'role_id' => $superAdmin->id,
        ]);

        User::create([
            'name' => 'Employee 1',
            'email' => 'employee1@mail.com',
            'password' => Hash::make('00000000'),
            'role_id' => $employee->id,
        ]);

        User::create([
            'name' => 'Employee 2',
            'email' => 'employee2@mail.com',
            'password' => Hash::make('00000000'),
            'role_id' => $employee->id,
        ]);

        User::create([
            'name' => 'Employee 3',
            'email' => 'employee3@mail.com',
            'password' => Hash::make('00000000'),
            'role_id' => $employee->id,
        ]);
    }
}
