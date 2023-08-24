<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaunchSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'employee_id',
        'status',
        'created_by',
        'updated_by',
    ];
}
