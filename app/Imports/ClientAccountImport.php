<?php

namespace App\Imports;

use App\Models\ClientAccount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ClientAccountImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $status = ($row[2] == 'ACTIVE') ? 1 : 0;
        $marketplace = ($row[1] == 'Amazon') ? 1 : 2;
        return new ClientAccount([
            'account_name' => $row[0],
            'marketplace' => $marketplace,
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
