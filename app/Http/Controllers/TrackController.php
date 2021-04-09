<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\TrackPaket;
use App\Models\DetailPaket;
use App\Models\PembayaranPaket;
use App\Models\Agen;
use App\Models\Kustomer;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TrackController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inputTrackPaket()
    {
        return view('data.paket.track_form', $this->data);
    }

    public function getTrackPaket(Request $request)
    {
        $this->validate($request, [
            'track_stt' => 'required'
        ]);

        $no_stt = str_replace("'", "", $request->track_stt);

        return redirect('track-paket/' . $no_stt);
    }

    public function trackPaket($stt)
    {
        $no_stt = str_replace("'", "", $stt);
        $cekpaket = Paket::where('no_stt', $no_stt)->first();
        if ($cekpaket == null) {
            $this->data['cekpaket'] = $cekpaket;
            return view('data.paket.404', $this->data);
        } else {
            $kustomer = $cekpaket->kustomer;
            $agen = $cekpaket->agen_perwakilan;
        }

        $cekkustomer = Kustomer::where('nama_kustomer', 'LIKE', '%' . $kustomer . '%')->first();
        $cekagen = Agen::where('nama_agen', $agen)->first();

        if ($cekkustomer == null || $cekagen == null) {
            $paket = Paket::where('no_stt', $no_stt)->get();
            if ($cekagen == null) {
                $this->data['alamatAgen'] = '-';
            } else {
                $namaAgen = $paket[0]->agen_perwakilan;
                $alamatAgen = Agen::where('nama_agen', $namaAgen)->pluck('alamat');
                $this->data['alamatAgen'] = $alamatAgen;
            }

            $track = TrackPaket::where('no_stt', $stt)->orderBy('created_at', 'DESC')->get();
            $fisikPaket = DetailPaket::where('no_stt', $no_stt)->get();
            $costPaket = PembayaranPaket::where('no_stt', $no_stt)->get();

            $this->data['paket'] = $paket;
            $this->data['fisik'] = $fisikPaket;
            $this->data['cost'] = $costPaket;
            $this->data['wilayahKustomer'] = '-';
            $this->data['track'] = $track;

            return view('data.paket.track_paket', $this->data);
        } else {
            $paket = Paket::where('no_stt', $no_stt)->get();
            $kustomer = $paket[0]->kustomer;
            $namaAgen = $paket[0]->agen_perwakilan;
            $track = TrackPaket::where('no_stt', $stt)->orderBy('created_at', 'DESC')->get();

            $wilayahKustomer = Kustomer::where('nama_kustomer', $kustomer)->pluck('wilayah');
            $alamatAgen = Agen::where('nama_agen', $namaAgen)->pluck('alamat');

            $fisikPaket = DetailPaket::where('no_stt', $no_stt)->get();
            $costPaket = PembayaranPaket::where('no_stt', $no_stt)->get();

            $this->data['paket'] = $paket;
            $this->data['fisik'] = $fisikPaket;
            $this->data['cost'] = $costPaket;
            $this->data['wilayahKustomer'] = $wilayahKustomer;
            $this->data['alamatAgen'] = $alamatAgen;
            $this->data['track'] = $track;

            return view('data.paket.track_paket', $this->data);
        }
    }

    public function printPaket($stt)
    {
        $cekpaket = Paket::where('no_stt', $stt)->first();

        $kustomer = $cekpaket->kustomer;
        $agen = $cekpaket->agen_perwakilan;
        $cekkustomer = Kustomer::where('nama_kustomer', 'LIKE', '%' . $kustomer . '%')->first();
        $cekagen = Agen::where('nama_agen', $agen)->first();
        $paket = Paket::where('no_stt', $stt)->get();
        if ($cekkustomer == null || $cekagen == null) {
            $this->data['alamatAgen'] = '-';
            $this->data['wilayahKustomer'] = '-';
            $this->data['expWilayah'] = '-';
        } else {
            $kustomer = $paket[0]->kustomer;
            $namaAgen = $paket[0]->agen_perwakilan;
            $wilayahKustomer = Kustomer::where('nama_kustomer', $kustomer)->pluck('wilayah');
            $exp = explode(' ', $wilayahKustomer[0]);
            $alamatAgen = Agen::where('nama_agen', $namaAgen)->pluck('alamat');

            $this->data['wilayahKustomer'] = $wilayahKustomer;
            $this->data['alamatAgen'] = $alamatAgen;
            $this->data['expWilayah'] = $exp;
        }

        $qrCode = QrCode::size(130)->generate(url('track-paket/' . $stt));
        $fisikPaket = DetailPaket::where('no_stt', $stt)->get();
        $costPaket = PembayaranPaket::where('no_stt', $stt)->get();

        $this->data['paket'] = $paket;
        $this->data['fisik'] = $fisikPaket;
        $this->data['cost'] = $costPaket;
        $this->data['qrCode'] = $qrCode;

        return view('data.paket.print_surat', $this->data);
    }
}
