<?php

namespace App\Exports;

use App\Models\EmployeeSalarySheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeSalarySheetExport implements FromCollection, WithHeadings
{
    protected $salary_month;
    protected $salary_year;
    protected $months = [
        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    ];

    public function __construct($salary_month, $salary_year)
    {
        $this->salary_month = $salary_month;
        $this->salary_year = $salary_year;
    }

    public function headings(): array
    {
        return [
            'Employee',
            'Employee ID',
            'Bank Account No',
            'Bank Name',
            'Branch Name',
            'Month',
            'Basic Salary',
            'Total Deduction',
            'Net Salary',
            'Created At',
        ];
    }

    public function collection()
    {
        
        $collection_data = EmployeeSalarySheet::where('salary_month', $this->salary_month)->where('salary_year', $this->salary_year)->get();
        $export_data = [];

        // add collection_data to export_data according to headings
        foreach ($collection_data as $data) {
            $export_data[] = [
                'employee'          => $data->employee->user->first_name . " " . $data->employee->user->last_name,
                'employee_id'       => $data->employee->employee_id,
                'bank_account_no'   => ($data->payrollAccount) ? $data->payrollAccount->account_number : "N/A",
                'bank_name'         => ($data->payrollAccount) ? $data->payrollAccount->bank_name : "N/A",
                'branch_name'       => ($data->payrollAccount) ? $data->payrollAccount->branch_name : "N/A",
                'salary_month'      => $this->months[$data->salary_month-1] . ", " . $data->salary_year,
                'basic_salary'      => $data->employee->monthly_salary,
                'total_deduction'   => $data->total_deduction,
                'net_salary'        => $data->net_salary,
                'created_at'        => $data->created_at,
            ];
        }

        return collect($export_data);
    }
}
