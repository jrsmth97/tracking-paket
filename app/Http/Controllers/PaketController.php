<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaketRequest;
use Illuminate\Http\Request;
use App\Exports\PaketExport;
use App\Imports\PaketImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Paket;
use App\Models\TrackPaket;
use App\Models\Kurir;
use App\Models\DetailPaket;
use App\Models\PembayaranPaket;
use App\Models\Agen;
use App\Models\Kustomer;
use App\Models\Provinces;
use App\Models\Notifications;

use DB;
use Session;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();

        $agens = Agen::all();
        $customers = Kustomer::all();
        $provinces = Provinces::all();
        $paket = Paket::orderBy('created_at', 'DESC')->get();

        $this->data['pakets'] = $paket;
        $this->data['agens'] = $agens;
        $this->data['customers'] = $customers;
        $this->data['provinces'] = $provinces;
    }

    public function daftarPaket()
    {

        return view('data.paket.daftar', $this->data);
    }

    public function addPaket()
    {
        return view('data.paket.form', $this->data);
    }

    public function ajaxSik($kustomer)
    {
        $sik = Kustomer::where('nama_kustomer', str_replace('%20', ' ', $kustomer))->first();

        return json_encode($sik);
    }

    public function storePaket(PaketRequest $request)
    {
        $paket1 = Paket::create([
            'no_stt' => $request->no_stt,
            'no_sik' => $request->no_sik,
            'kustomer' => $request->kustomer,
            'agen_perwakilan' => $request->agen_perwakilan,
            'pelayanan' => $request->pelayanan,
            'tujuan' => $request->tujuan,
            'kota_tujuan' => $request->wilayah,
            'tipe_paket' => $request->tipe_paket,
            'alamat_pengirim' => $request->alamat_pengirim,
            'alamat_penerima' => $request->alamat_penerima,
        ]);
        $paket2 = DetailPaket::create([
            'no_stt' => $request->no_stt,
            'koli' => $request->koli,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
        ]);
        $paket3 = PembayaranPaket::create([
            'no_stt' => $request->no_stt,
            'pembayaran' => $request->pembayaran,
            'tanggal_input' => $request->tanggal_input,
            'tanggal_pickup' => $request->tanggal_pickup,
            'biaya_tambahan' => $request->biaya_tambahan,
            'diskon' => $request->diskon,
            'total_harga' => $request->total_harga,
        ]);
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menambahkan paket baru [' . $request->no_stt . ']',
            'active' => 1,
            'action' => 'daftar-paket'
        ]);

        if ($paket1 && $paket2 && $paket3 && $notif) {
            Session::flash('success', 'Paket berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan paket !');
        }

        return redirect('daftar-paket');
    }

    public function editPaket($stt)
    {
        $paket = Paket::where('no_stt', $stt)->get();
        $fisikPaket = DetailPaket::where('no_stt', $stt)->get();
        $costPaket = PembayaranPaket::where('no_stt', $stt)->get();

        $this->data['paket'] = $paket;
        $this->data['fisik'] = $fisikPaket;
        $this->data['cost'] = $costPaket;

        return view('data.paket.form', $this->data);
    }

    public function updatePaket(PaketRequest $request, $id)
    {
        $params = $request->except('_token');

        $paket = Paket::findOrFail($id);
        $detail = DetailPaket::findOrFail($id);
        $cost = PembayaranPaket::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($paket, $detail, $cost, $params) {
            $paket->update($params);
            $detail->update($params);
            $cost->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit paket no [' . $request->no_stt . ']',
            'active' => 1,
            'action' => 'edit-paket/' . $request->no_stt,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Paket berhasil diupdate');
        } else {
            Session::flash('error', 'Paket tidak dapat diupdate');
        }

        return redirect('daftar-paket');
    }

    public function deletePaket($id)
    {
        $paket = Paket::findOrFail($id);
        $no = Paket::where('id', $id)->pluck('no_stt');
        $detail = DetailPaket::findOrFail($id);
        $cost = PembayaranPaket::findOrFail($id);

        if ($paket->delete() && $detail->delete() && $cost->delete()) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus paket no [' . $no[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Paket berhasil dihapus');
        }

        return redirect('daftar-paket');
    }

    public function trackInput($stt)
    {
        $paket = Paket::where('no_stt', $stt)->get();
        $kurir = Kurir::all();

        $this->data['paket'] = $paket;
        $this->data['kurir'] = $kurir;

        return view('data.paket.track_input', $this->data);
    }

    public function storeTrack(Request $request, $stt)
    {
        $this->validate($request, [
            'wilayah' => 'required',
            'kurir' => 'required',
            'track_photo' => 'mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('track_photo');
        if ($file) {
            $nama_file = date('d-m-Y') . $file->getClientOriginalName();
            $folder = 'storage/track_photo';
            $file->move($folder, $nama_file);

            $track = TrackPaket::create([
                'no_stt' => $stt,
                'lokasi' => $request->wilayah,
                'kurir' => $request->kurir,
                'detail' => $request->detail,
                'photo' => $folder . '/' . $nama_file,
            ]);
        } else {
            $track = TrackPaket::create([
                'no_stt' => $stt,
                'lokasi' => $request->wilayah,
                'kurir' => $request->kurir,
                'detail' => $request->detail,
            ]);
        }

        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menginput tracking paket no [' . $stt . ']',
            'active' => 1,
            'action' => 'track-paket/' . $stt,
        ]);


        if ($track && $notif) {
            Session::flash('success', 'Track berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan track !');
        }

        return redirect('track-paket/' . $stt);
    }

    public function export()
    {
        return Excel::download(new PaketExport, 'daftar-paket.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'import_paket' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_paket');
        $nama_file = date('d-m-Y') . '-paket-' . $file->getClientOriginalName();
        $folder = 'storage/import_paket';
        $file->move($folder, $nama_file);

        Excel::import(new PaketImport, public_path('/storage/import_paket/' . $nama_file));

        Session::flash('success', 'Paket Berhasil Diimport!');

        return redirect('daftar-paket');
    }
}
