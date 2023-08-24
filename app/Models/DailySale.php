<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientAccount;

class DailySale extends Model
{
    use HasFactory;

    protected $fillable = [
        'caccount_id',
        'marketplace',
        'date',
        'currency',
        'all_sales',
        'tacos',
        'sponsored_sales',
        'acos',
        'cost',
        'clicks',
        'impressions',
        'cr',
        'cpc',
        'roas',
    ];

    public function clientAccount()
    {
        return $this->belongsTo(ClientAccount::class, 'caccount_id', 'id');
    }
}
