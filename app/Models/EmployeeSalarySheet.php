<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalarySheet extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function payrollAccount()
    {
        return $this->belongsTo(PayrollAccount::class, 'payroll_account_id', 'id');
    }
}
