<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWeeklyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_number',
        'week_start_date',
        'week_end_date',
        'client_name',
        'amz_seller_support_issues',
        'amz_seller_support_case_url',
        'walmart_seller_support_issues',
        'walmart_seller_support_case_url',
        'is_amazon_us_data_added',
        'is_amazon_ca_data_added',
        'is_walmart_data_added',
        'is_meeting_notes_added',
        'is_weekly_tasks_added',
        'is_multiple_accounts',
        'report_template_theme',
        'parent_report_id',
    ];

    public function weeklyAmazonUsSales()
    {
        return $this->hasMany(WeeklySale::class, 'client_weekly_report_id', 'id')->where('marketplace', 0);
    }

    public function weeklyAmazonCaSales()
    {
        return $this->hasMany(WeeklySale::class, 'client_weekly_report_id', 'id')->where('marketplace', 1);
    }

    public function weeklyWalmartSales()
    {
        return $this->hasMany(WeeklySale::class, 'client_weekly_report_id', 'id')->where('marketplace', 2);
    }

    public function childReports()
    {
        return $this->hasMany(ClientWeeklyReport::class, 'parent_report_id', 'id');
    }

    public function parentReport()
    {
        return $this->belongsTo(ClientWeeklyReport::class, 'parent_report_id', 'id');
    }
}
