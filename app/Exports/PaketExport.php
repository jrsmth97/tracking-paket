<?php

namespace App\Exports;

use App\Models\Paket;
use App\Models\DetailPaket;
use App\Models\PembayaranPaket;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaketExport implements FromView, ShouldAutoSize, WithStyles
{
    public function view(): View
    {
        return view('data.paket.export_excel', [
            'pakets' => Paket::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            3    => ['font' => ['bold' => true]],
        ];
    }

    // public function headings(): array
    // {
    //     return [
    //         'No STT',
    //         'Kustomer',
    //         'Agen Perwakilan',
    //         'Tujuan',
    //         'Tipe Paket',
    //         'Tanggal',
    //         'Tarif',
    //         'Berat (Kg)',
    //         'Koli',
    //     ];
    // }

    // public function collection()
    // {
    //     $paket1 = Paket::select('no_stt', 'kustomer', 'agen_perwakilan', 'tujuan', 'tipe_paket')->get();
    //     $paket2 = PembayaranPaket::select('tanggal_input', 'total_harga')->get();
    //     $paket3 = DetailPaket::select('berat', 'koli')->get();

    //     $paket = [$paket1, $paket2, $paket3];

    //     return collect($paket);
    // }
}
