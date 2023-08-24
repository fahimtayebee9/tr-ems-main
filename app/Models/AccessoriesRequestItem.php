<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoriesRequestItem extends Model
{
    use HasFactory;

    public function accessory()
    {
        return $this->belongsTo(AccessoriesItem::class, 'accessory_id', 'id');
    }
}
