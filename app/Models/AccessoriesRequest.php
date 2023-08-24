<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoriesRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'status',
    ];

    public function itemsList()
    {
        return $this->hasMany(AccessoriesRequestItem::class);
    }

    public function accessory()
    {
        return $this->belongsTo(AccessoriesItem::class, 'accessory_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
