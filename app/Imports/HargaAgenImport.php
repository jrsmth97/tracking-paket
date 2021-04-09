<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\HargaAgen;
use App\Models\Notifications;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class HargaAgenImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $uri = \Request::getRequestUri();
        $exp = explode('/', $uri);
        $kode = $exp[2];

        foreach ($rows as $row) {
            HargaAgen::create([
                'kode' => $kode,
                'tujuan' => $row['tujuan'],
                'harga_normal' => $row['harga_normal'],
                'harga_express' => $row['harga_express'],
                'harga_super_express' => $row['harga_super_express'],
            ]);
        }
        Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengimport harga agen [' . $kode . '] via excel',
            'active' => 1,
            'action' => 'detail-harga-agen/' . $kode,
        ]);
    }
}
