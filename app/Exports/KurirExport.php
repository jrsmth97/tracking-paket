<?php

namespace App\Exports;

use App\Models\Kurir;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KurirExport implements FromView, ShouldAutoSize, WithStyles
{
    public function view(): View
    {
        return view('data.kurir.export_kurir', [
            'couriers' => Kurir::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            3    => ['font' => ['bold' => true]],
        ];
    }
}
