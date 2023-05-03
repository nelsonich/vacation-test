<?php

use App\Models\RBAC\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Пользователи',
            'slug' => 'users',
        ]);

        Permission::create([
            'name' => 'Управление отпуском',
            'slug' => 'vacations',
        ]);
    }
}
