<?php

namespace App\Exports;

use App\Models\Kustomer;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KustomerExport implements FromView, ShouldAutoSize, WithStyles
{
    public function view(): View
    {
        return view('data.customer.export_kustomer', [
            'customers' => Kustomer::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            3    => ['font' => ['bold' => true]],
        ];
    }
}
