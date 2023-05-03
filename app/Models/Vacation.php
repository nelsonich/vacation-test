<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'approved' => 'boolean',
    ];

    protected $table = "vacations";

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
    ];

    const RULES = [
        'start_date' => 'required',
        'end_date' => 'required',
    ];
}
