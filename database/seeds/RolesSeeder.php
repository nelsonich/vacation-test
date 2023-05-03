<?php

use App\Models\RBAC\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => Role::SUPER_ADMIN,
            'description' => 'Пользователь Super Admin - это человек, который следит за всем управлением сетью. Пользователь с суперадминистратором имеет следующие возможности: Управлять доступом и уровнем ответственности всех пользователей на всех сайтах в вашей сети. Управляйте функциями сети и сайта, включая доступ к плагинам, темам и настройкам конфиденциальности.'
        ]);

        Role::create([
            'name' => Role::EMPLOYEE,
            'description' => 'Рядовой Сотрудник, который может - ввести начало и конец отпуска, посмотреть какие даты отпусков у других сотрудников, скорректировать свои даты'
        ]);
    }
}
