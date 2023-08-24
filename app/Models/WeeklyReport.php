<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    use HasFactory;

    public function clientAccount(){
        return $this->belongsTo(ClientAccount::class, 'caccount_id', 'id');
    }
}
