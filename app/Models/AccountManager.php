<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function caccount()
    {
        return $this->belongsTo(ClientAccount::class, 'account_id', 'id');
    }
}
