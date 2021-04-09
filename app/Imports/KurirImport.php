<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Kurir;
use App\Models\Users;
use App\Models\Notifications;

use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class KurirImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Kurir::create([
                'nama_kurir' => $row['nama'],
                'nama_agen' => $row['agen'],
                'no_hp' => $row['no_hp'],
                'alamat' => $row['alamat'],
                'kendaraan' => $row['kendaraan'],
                'merk_kendaraan' => $row['merk_kendaraan'],
                'no_plat' => $row['no_plat'],
            ]);

            Users::create([
                'type' => 'kurir',
                'nama' => $row['nama'],
                'username' => $row['username'],
                'password' => Hash::make($row['password']),
            ]);
        }
        Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengimport data kurir via excel',
            'active' => 1,
            'action' => 'data-kurir',
        ]);
    }
}
