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
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;

class UsersImport implements ToModel, WithStartRow, WithMultipleSheets
{
    public function sheets(): array
    {
        // select Template sheet
        return [
            0 => $this,
        ];
    }

    public function model(array $row)
    {
        $user_full_name = explode(' ', trim($row[1]));
        $first_name = null;
        $last_name = null;
        if(count($user_full_name) > 2) {
            $first_name = $user_full_name[0] . ' ' . $user_full_name[1];
            $last_name = $user_full_name[2];
        } else if(count($user_full_name) > 1) {
            $first_name = $user_full_name[0];
            $last_name = $user_full_name[1];
        } else {
            $first_name = $user_full_name[0];
            $last_name = '';
        }

        $roleManager = RoleManager::where('name', 'like' ,trim($row[0]))->first();
        if(!empty($row[0]) || $row[0] != null && $roleManager != null){
            return new User([
                'first_name'    => $first_name,
                'last_name'     => $last_name,
                'username'      => trim($row[2]),
                'email'         => $row[3],
                'phone'         => $row[4],
                'blood_group'   => $row[5],
                'password'      => Hash::make(trim($row[6])),
                'role_id'       => ($roleManager == null) ? 3 : $roleManager->id,
                'cspwdbycrt'    => trim($row[6]),
                'status'        => ($row[7] == 'Active') ? 1 : 0,
                'image'         => $row[8],
            ]);
        }
        else{
            return;
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
