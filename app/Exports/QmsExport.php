<?php

namespace App\Exports;

use App\Models\Qms;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;


class QmsExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        // TODO: Implement headings() method.
 
        return [
            "Nama",
            "Email",
            "Id",
            "SOP Makro",
            "Nomor SOP",
        ];
    }
    public function collection()
    {
        // return Qms::all();
        return collect(Qms::getQms());
    }
}
