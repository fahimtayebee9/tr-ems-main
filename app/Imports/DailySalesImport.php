<?php

namespace App\Imports;

use App\Models\DailySale;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DailySalesImport implements ToModel, WithStartRow
{   
    protected $caccount_id;

    public function __construct($caccount_id)
    {
        $this->caccount_id = $caccount_id;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new DailySale([
            'caccount_id'       => $this->caccount_id,
            'marketplace'       => $row[0],
            'date'              => date('Y-m-d', strtotime($row[1])),
            'currency'          => $row[2],
            'all_sales'         => ($row[3] == null || $row[3] == '-') ? 0 : $row[3],
            'tacos'             => ($row[4] == null || $row[4] == '-') ? 0 : $row[4],
            'sponsored_sales'   => ($row[5] == null || $row[5] == '-') ? 0 : $row[5],
            'acos'              => ($row[6] == null || $row[6] == '-') ? 0 : $row[6],
            'cost'              => ($row[7] == null || $row[7] == '-') ? 0 : $row[7],
            'clicks'            => ($row[8] == null || $row[8] == '-') ? 0 : $row[8],
            'impressions'       => ($row[9] == null || $row[9] == '-') ? 0 : $row[9],
            'cr'                => ($row[10] == null || $row[10] == '-') ? 0 : $row[10],
            'cpc'               => ($row[11] == null || $row[11] == '-') ? 0 : $row[11],
            'roas'              => ($row[12] == null || $row[12] == '-') ? 0 : $row[12],
        ]);
    }
}
