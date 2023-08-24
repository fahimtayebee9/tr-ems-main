<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function employees()
    {
        return [];
    }
}
