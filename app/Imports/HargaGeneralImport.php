<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\HargaGeneral;
use App\Models\Notifications;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class HargaGeneralImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            HargaGeneral::create([
                'tujuan' => $row['tujuan'],
                'harga_normal' => $row['harga_normal'],
                'edd_normal' => $row['edd_normal'],
                'harga_express' => $row['harga_express'],
                'edd_express' => $row['edd_express'],
                'harga_super_express' => $row['harga_super_express'],
                'edd_super_express' => $row['edd_super_express'],
            ]);
        }
        Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengimport harga general via excel',
            'active' => 1,
            'action' => 'harga-general',
        ]);
    }
}
