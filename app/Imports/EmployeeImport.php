<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Employee;
use App\Models\AccountManager;
use App\Models\RoleManager;
use App\Models\Department;
use App\Models\EmployeeRole;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeImport implements ToModel, WithStartRow, WithMultipleSheets
{
    protected $usersList = [];

    public function __construct($all_users)
    {
        $this->usersList = $all_users;
    }
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    public function startRow(): int
    {
        return 4;
    }

    public function model(array $row)
    {
        $userData = $this->usersList->where('username', trim($row[2]))->first();

        if($userData == null || empty($userData)){
            return;
        }

        // dd(Department::where('name', trim($row[9]))->first());

        return new Employee([
            'employee_id'       => $row[2],
            'user_id'           => $userData->id,
            'department_id'     => (Department::where('name', trim($row[9]))->first() == null) ? null : 
                                    Department::where('name', trim($row[9]))->first()->id,
            'designation_id'    => (EmployeeRole::where('name', 'like', trim($row[11]))->first() == null) ? null : 
                                    EmployeeRole::where('name', 'like', trim($row[11]))->first()->id,
            'team_lead_id'      => null,
            'temporary_role'    => null,
            'monthly_salary'    => $row[14],
            'awards_won'        => $row[15],
            'joining_date'      => date('Y-m-d', strtotime($row[16])),
            'paid_leaves_applicable' => ($row[17] == 'Yes') ? 1 : 0,
        ]);
    }
}
