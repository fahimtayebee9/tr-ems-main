<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'processor',
        'motherboard',
        'ram',
        'power_supply',
        'graphics_card',
        'hard_disk',
        'ssd',
        'keyboard',
        'mouse',
        'ups',
        'monitor',
        'headphone',
        'casing',
        'mouse_pad'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
