<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Employee;
use App\Models\AccountManager;
use App\Models\RoleManager;
use App\Models\Department;
use App\Models\EmployeeRole;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}
