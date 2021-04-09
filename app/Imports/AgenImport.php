<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Agen;
use App\Models\Notifications;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class AgenImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Agen::create([
                'kode' => $row['kode'],
                'nama_agen' => $row['nama'],
                'telepon' => $row['telepon'],
                'telepon_seluler' => $row['seluler'],
                'wilayah' => $row['wilayah'],
                'alamat' => $row['alamat'],
            ]);
        }
        Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengimport data agen via excel',
            'active' => 1,
            'action' => 'data-agen',
        ]);
    }
}
