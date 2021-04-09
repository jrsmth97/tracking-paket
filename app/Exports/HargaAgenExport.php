<?php

namespace App\Exports;

use App\Models\HargaAgen;
use App\Models\Agen;
use Illuminate\Http\Request;

use Session;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HargaAgenExport implements FromView, ShouldAutoSize, WithStyles
{

    public function view(): View
    {
        $urlParam = \Request::getRequestUri();

        $exp = explode('/', $urlParam);
        $kode = $exp[2];
        $cekHarga = HargaAgen::where('kode', $kode)->first();

        if ($cekHarga == null) {
            return view('404_table');
        } else {
            return view('data.agen.export_harga', [
                'hargaAgen' => HargaAgen::where('kode', $kode)->get()
            ]);
        }
    }

    public function styles(Worksheet $sheet)
    {
        return [
            3    => ['font' => ['bold' => true]],
        ];
    }
}
