<?php

namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPER_ADMIN = "super_admin";
    const EMPLOYEE = "employee";

    protected $table = "roles";
    protected $fillable = ['name', 'description'];
}
