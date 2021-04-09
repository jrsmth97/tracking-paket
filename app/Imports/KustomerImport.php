<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Kustomer;
use App\Models\Users;
use App\Models\Notifications;

use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class KustomerImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Kustomer::create([
                'kode' => $row['kode'],
                'nama_kustomer' => $row['nama'],
                'telepon' => $row['telepon'],
                'telepon_seluler' => $row['seluler'],
                'fax' => $row['fax'],
                'email' => $row['email'],
                'wilayah' => $row['wilayah'],
                'alamat' => $row['alamat'],
            ]);

            Users::create([
                'type' => 'kustomer',
                'nama' => $row['nama'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'kode' => $row['kode']
            ]);
        }
        Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengimport data kustomer via excel',
            'active' => 1,
            'action' => 'data-kustomer',
        ]);
    }
}
