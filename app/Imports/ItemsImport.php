<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow; #agar heading kolom tidak masuk db

class ItemsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'code' => $row[1],
            'item' => $row[2],
            'tahun_perolehan' => $row[3],
            'nup' => $row[4],
            'merk' => $row[5],
            'kondisi' => $row[6],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
