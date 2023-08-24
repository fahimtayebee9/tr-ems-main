<?php

namespace App\Imports;

use App\Models\EmployeeRole;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class DesignationImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $status = ($row[2] == 'ACTIVE') ? 1 : 0;
        return new EmployeeRole([
            'name' => $row[0],
            'slug' => Str::slug($row[0], '-'),
            'description' => $row[1],
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
