<?php

namespace App\Exports;

use App\Models\HargaGeneral;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HargaGeneralExport implements FromView, ShouldAutoSize, WithStyles
{

    public function view(): View
    {
        $cekHarga = HargaGeneral::first();

        if ($cekHarga == null) {
            return view('404_table');
        } else {
            return view('data.export_harga_general', [
                'hargaGeneral' => HargaGeneral::all()
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
