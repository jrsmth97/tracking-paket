<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Paket;
use App\Models\DetailPaket;
use App\Models\PembayaranPaket;
use App\Models\Notifications;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class PaketImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Paket::create([
                'no_stt' => $row['no_stt'],
                'no_sik' => $row['no_sik'],
                'kustomer' => $row['pengirim'],
                'agen_perwakilan' => $row['agen_perwakilan'],
                'tujuan' => $row['penerima'],
                'kota_tujuan' => $row['kota_tujuan'],
                'tipe_paket' => $row['tipe_paket'],
                'alamat_pengirim' => $row['alamat_pengirim'],
                'alamat_penerima' => $row['alamat_penerima'],
                'pelayanan' => 'harga_' . strtolower(str_replace(' ', '_', $row['pelayanan'])),
            ]);

            DetailPaket::create([
                'no_stt' => $row['no_stt'],
                'koli' => $row['koli'],
                'panjang' => $row['panjang'],
                'lebar' => $row['lebar'],
                'tinggi' => $row['tinggi'],
                'berat' => $row['berat'],
                'keterangan' => $row['keterangan'],
            ]);

            PembayaranPaket::create([
                'no_stt' => $row['no_stt'],
                'pembayaran' => $row['pembayaran'],
                'tanggal_input' => date('Y-m-d'),
                'tanggal_pickup' => date('Y-m-d'),
                'biaya_tambahan' => $row['biaya_tambahan'],
                'diskon' => $row['diskon'],
                'total_harga' => $row['total_harga'],
            ]);
        }
        Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengimport data paket via excel',
            'active' => 1,
            'action' => 'daftar-paket',
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
