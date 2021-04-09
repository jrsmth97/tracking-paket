<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\HargaKustomer;
use App\Models\Notifications;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class HargaKustomerImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $uri = \Request::getRequestUri();
        $exp = explode('/', $uri);
        $kode = $exp[2];

        foreach ($rows as $row) {
            HargaKustomer::create([
                'kode' => $kode,
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
            'messages' => 'telah mengimport harga kustomer [' . $kode . '] via excel',
            'active' => 1,
            'action' => 'detail-harga-kustomer/' . $kode,
        ]);
    }
}
