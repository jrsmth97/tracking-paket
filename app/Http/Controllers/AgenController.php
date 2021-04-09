<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgenRequest;
use App\Exports\AgenExport;
use App\Exports\HargaAgenExport;
use App\Imports\AgenImport;
use App\Imports\HargaAgenImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\HargaAgen;
use App\Models\Agen;
use App\Models\Provinces;
use App\Models\Notifications;

use Session;
use DB;

class AgenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

        $this->data['wilayah']  = Agen::pluck('wilayah');
    }

    public function dataAgen()
    {
        $agens = Agen::orderBy('id', 'DESC')->paginate(10);

        $this->data['agens']  = $agens;

        return view('data.agen.index', $this->data);
    }

    public function createAgen()
    {
        $provinces = Provinces::all();

        $this->data['provinces'] = $provinces;

        return view('data.agen.form', $this->data);
    }

    public function storeAgen(AgenRequest $request)
    {
        $params = $request->except('_token');
        $agen = DB::transaction(function () use ($params) {
            $agen = Agen::create($params);
            return $agen;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menambahkan agen baru [' . $request->nama_agen . ']',
            'active' => 1,
            'action' => 'data-agen'
        ]);

        if ($agen && $notif) {
            Session::flash('success', 'Agen berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan agen !');
        }

        return redirect('data-agen');
    }

    public function editAgen($id)
    {
        $agen = Agen::findOrFail($id);
        $agens = Agen::orderBy('id', 'DESC')->get();
        $provinces = Provinces::all();

        $this->data['agens'] = $agens->toArray();
        $this->data['agen'] = $agen;
        $this->data['provinces'] = $provinces;

        return view('data.agen.form', $this->data);
    }

    public function updateAgen(Request $request, $id)
    {
        $params = $request->except('_token');

        $nama = Agen::where('id', $id)->pluck('nama_agen');
        $agen = Agen::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($agen, $params) {
            $agen->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit agen [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'data-agen/' . $id,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Agen berhasil diupdate');
        } else {
            Session::flash('error', 'Agen tidak dapat diupdate');
        }

        return redirect('data-agen');
    }


    public function deleteAgen($id)
    {
        $nama = Agen::where('id', $id)->pluck('nama_agen');
        $agens = Agen::findOrFail($id);


        if ($agens->delete()) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus agen [' . $nama[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Agen berhasil dihapus');
        }

        return redirect('data-agen');
    }

    public function export_agen()
    {
        return Excel::download(new AgenExport, 'daftar-agen.xlsx');
    }

    public function import_agen(Request $request)
    {
        $this->validate($request, [
            'import_agen' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_agen');
        $nama_file = date('d-m-Y') . $file->getClientOriginalName();
        $folder = 'storage/import_agen';
        $file->move($folder, $nama_file);

        Excel::import(new AgenImport, public_path('/storage/import_agen/' . $nama_file));

        Session::flash('success', 'Agen Berhasil Diimport!');

        return redirect('data-agen');
    }

    public function hargaAgen()
    {
        $agens = Agen::orderBy('id', 'DESC')->paginate(10);

        return view('data.agen.harga', compact('agens'), $this->data);
    }

    public function detailHargaAgen($kodeAgen)
    {
        $detailHargaAgen = HargaAgen::where('kode', $kodeAgen)->orderBy('id', 'DESC')->paginate(10);

        $idAgen = Agen::where('kode', $kodeAgen)->get();

        return view('data.agen.harga-detail', compact('detailHargaAgen', 'idAgen'), $this->data);
    }

    public function createHargaAgen($kodeAgen)
    {
        $provinces = Provinces::all();
        $agen = Agen::where('kode', $kodeAgen)->get();
        // $hargaAgen = HargaAgen::findOrFail($kodeAgen);
        $hargaAgen = Agen::where('kode', $kodeAgen)->get();

        return view('data.agen.form-harga', compact('provinces', 'agen', 'hargaAgen'), $this->data);
    }

    public function storeHargaAgen(Request $request, $kodeAgen)
    {
        $this->validate($request, [
            'wilayah' => 'required',
            'harga_normal' => 'required|numeric',
        ]);

        $kodeAgen = Agen::where('kode', $kodeAgen)->get();
        $nama = Agen::where('kode', $kodeAgen[0]->kode)->pluck('nama_agen');

        $kustomer = HargaAgen::create([
            'kode' => str_replace('-', ' ', $kodeAgen[0]->kode),
            'tujuan' => $request->wilayah,
            'harga_normal' => $request->harga_normal,
            'harga_express' => $request->harga_express,
            'harga_super_express' => $request->harga_super_express,
        ]);
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menambahkan harga agen baru [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'detail-harga-agen/' . $kodeAgen[0]->kode
        ]);

        if ($kustomer && $notif) {
            Session::flash('success', 'Harga agen berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan harga agen !');
        }

        return redirect('detail-harga-agen/' . $kodeAgen[0]->kode);
    }

    public function editHargaAgen($kodeAgen, $id)
    {
        $cekAgens = HargaAgen::where(['kode' => $kodeAgen, 'id' => $id])->first();
        if ($cekAgens == null) {
            return view('404');
        } else {
            $kodeAgens = HargaAgen::where(['kode' => $kodeAgen, 'id' => $id])->get();
            $namaAgen = Agen::where('kode', str_replace('-', ' ', $kodeAgen))->pluck('nama_agen');
            $provinces = Provinces::all();

            $this->data['kodeAgen'] = $kodeAgens->toArray();
            $this->data['namaAgen'] = $namaAgen;
            $this->data['provinces'] = $provinces;

            return view('data.agen.form-harga', $this->data);
        }
    }

    public function updateHargaAgen(Request $request, $kodeAgen, $id)
    {
        $kodeAgen = Agen::where('kode', $kodeAgen)->get();
        $nama = Agen::where('kode', $kodeAgen[0]->kode)->pluck('nama_agen');
        $params = $request->except('_token');

        $hargaAgen = HargaAgen::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($hargaAgen, $params) {
            $hargaAgen->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit harga agen [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'harga-agen/' . $kodeAgen[0]->kode . '/' . $id,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Harga agen berhasil diupdate');
        } else {
            Session::flash('error', 'Harga agen tidak dapat diupdate');
        }

        return redirect('detail-harga-agen/' . $kodeAgen[0]->kode);
    }

    public function deleteHargaAgen($kodeAgen, $id)
    {
        $kodeAgen = Agen::where('kode', $kodeAgen)->get();
        $nama = Agen::where('kode', $kodeAgen[0]->kode)->pluck('nama_agen');
        $hargaAgen = HargaAgen::findOrFail($id);

        if ($hargaAgen->delete()) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus harga agen [' . $nama[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Harga berhasil dihapus');
        }

        return redirect('detail-harga-agen/' . $kodeAgen[0]->kode);
    }

    public function export_harga($kode)
    {
        return Excel::download(new HargaAgenExport, 'harga-agen-' . $kode . '.xlsx');
    }

    public function import_harga_agen(Request $request, $kode)
    {
        $this->validate($request, [
            'import_harga_agen' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_harga_agen');
        $nama_file = date('d-m-Y') . '-harga-' . $file->getClientOriginalName();
        $folder = 'storage/import_agen';
        $file->move($folder, $nama_file);

        Excel::import(new HargaAgenImport, public_path('/storage/import_agen/' . $nama_file));

        Session::flash('success', 'Harga Agen Berhasil Diimport!');

        return redirect('detail-harga-agen/' . $kode);
    }
}
