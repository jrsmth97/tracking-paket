<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KustomerRequest;
use App\Exports\KustomerExport;
use App\Exports\HargaKustomerExport;
use App\Imports\KustomerImport;
use App\Imports\HargaKustomerImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;

use App\Models\Provinces;
use App\Models\Kustomer;
use App\Models\Users;
use App\Models\HargaKustomer;
use App\Models\Notifications;

use Session;
use DB;

class KustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function dataKustomer()
    {
        $customers = Kustomer::orderBy('id', 'DESC')->paginate(10);

        return view('data.customer.index', compact('customers'), $this->data);
    }


    public function createKustomer()
    {
        $provinces = Provinces::all();

        return view('data.customer.form', compact('provinces'), $this->data);
    }

    public function storeKustomer(KustomerRequest $request)
    {
        $kustomer = Kustomer::create([
            'kode' => $request->kode,
            'nama_kustomer' => $request->nama_kustomer,
            'no_sik' => $request->no_sik,
            'telepon' => $request->telepon,
            'telepon_seluler' => $request->telepon_seluler,
            'fax' => $request->fax,
            'email' => $request->email,
            'wilayah' => $request->wilayah,
            'alamat' => $request->alamat
        ]);
        $userKustomer = Users::create([
            'type' => 'kustomer',
            'email' => $request->email,
            'nama' => $request->nama_kustomer,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'kode' => $request->kode
        ]);
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menambahkan kustomer baru [' . $request->nama_kustomer . ']',
            'active' => 1,
            'action' => 'data-kustomer'
        ]);

        if ($kustomer && $userKustomer && $notif) {
            Session::flash('success', 'Kustomer berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan agen !');
        }

        return redirect('data-kustomer');
    }


    public function editKustomer($id)
    {
        $customer = Kustomer::findOrFail($id);
        $name = $customer->pluck('nama_kustomer');
        $customers = Kustomer::orderBy('id', 'DESC')->get();
        $account = Users::where('nama', $name)->get('username');
        $provinces = Provinces::all();

        $this->data['customers'] = $customers->toArray();
        $this->data['customer'] = $customer;
        $this->data['account'] = $account;
        $this->data['provinces'] = $provinces;

        return view('data.customer.form', $this->data);
    }

    public function updateKustomer(Request $request, $id)
    {
        $params = $request->except('_token');

        $nama = Kustomer::where('id', $id)->pluck('nama_kustomer');
        $kustomer = Kustomer::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($kustomer, $params) {
            $kustomer->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit kustomer [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'edit-kustomer/' . $id,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Kustomer berhasil diupdate');
        } else {
            Session::flash('error', 'Kustomer tidak dapat diupdate');
        }

        return redirect('data-kustomer');
    }

    public function deleteKustomer($id)
    {
        $nama = Kustomer::where('id', $id)->pluck('nama_kustomer');
        $customers = Kustomer::findOrFail($id);
        $akun = Users::where('nama', $nama[0])->delete();
        if ($customers->delete() && $akun) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus kustomer [' . $nama[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Kustomer berhasil dihapus');
        }

        return redirect('data-kustomer');
    }

    public function export_kustomer()
    {
        return Excel::download(new KustomerExport, 'daftar-kustomer.xlsx');
    }

    public function import_kustomer(Request $request)
    {
        $this->validate($request, [
            'import_kustomer' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_kustomer');
        $nama_file = date('d-m-Y') . $file->getClientOriginalName();
        $folder = 'storage/import_kustomer';
        $file->move($folder, $nama_file);

        Excel::import(new KustomerImport, public_path('/storage/import_kustomer/' . $nama_file));

        Session::flash('success', 'Kustomer Berhasil Diimport!');

        return redirect('data-kustomer');
    }

    public function hargaKustomer()
    {
        $customers = Kustomer::orderBy('id', 'DESC')->paginate(10);

        return view('data.customer.harga', compact('customers'), $this->data);
    }

    public function detailHargaKustomer($kodeKustomer)
    {
        $detailHargaKustomer = HargaKustomer::where('kode', $kodeKustomer)->orderBy('id', 'DESC')->paginate(10);

        $idKustomer = Kustomer::where('kode', $kodeKustomer)->get();

        return view('data.customer.harga-detail', compact('detailHargaKustomer', 'idKustomer'), $this->data);
    }

    public function createHargaKustomer($kodeKustomer)
    {
        $provinces = Provinces::all();
        $kustomer = Kustomer::where('kode', $kodeKustomer)->get();
        // $hargaAgen = HargaAgen::findOrFail($kodeAgen);
        $hargaKustomer = Kustomer::where('kode', $kodeKustomer)->get();

        return view('data.customer.form-harga', compact('provinces', 'kustomer', 'hargaKustomer'), $this->data);
    }

    public function storeHargaKustomer(Request $request, $kodeKustomer)
    {
        $this->validate($request, [
            'wilayah' => 'required',
            'harga_normal' => 'required|numeric',
            'edd_normal' => 'required',
        ]);

        $kodeKustomer = Kustomer::where('kode', $kodeKustomer)->get();
        $nama = Kustomer::where('kode', $kodeKustomer[0]->kode)->pluck('nama_kustomer');

        $kustomer = HargaKustomer::create([
            'kode' => str_replace('-', ' ', $kodeKustomer[0]->kode),
            'tujuan' => $request->wilayah,
            'harga_normal' => $request->harga_normal,
            'harga_express' => $request->harga_express,
            'harga_super_express' => $request->harga_super_express,
            'edd_normal' => $request->edd_normal,
            'edd_express' => $request->edd_express,
            'edd_super_express' => $request->edd_super_express,
        ]);
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menambahkan harga kustomer baru [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'detail-harga-kustomer/' . $kodeKustomer[0]->kode
        ]);

        if ($kustomer && $notif) {
            Session::flash('success', 'Harga kustomer berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan harga kustomer !');
        }

        return redirect('detail-harga-kustomer/' . $kodeKustomer[0]->kode);
    }

    public function editHargaKustomer($kodeKustomer, $id)
    {
        $check = HargaKustomer::where(['kode' => $kodeKustomer, 'id' => $id])->first();
        if ($check == null) {
            return redirect('404');
        } else {
            $kodeKustomers = HargaKustomer::where(['kode' => $kodeKustomer, 'id' => $id])->get();

            $namaKustomer = Kustomer::where('kode', str_replace('-', ' ', $kodeKustomer))->pluck('nama_kustomer');
            $provinces = Provinces::all();

            $this->data['kodeKustomer'] = $kodeKustomers->toArray();
            $this->data['namaKustomer'] = $namaKustomer;
            $this->data['provinces'] = $provinces;

            return view('data.customer.form-harga', $this->data);
        }
    }

    public function updateHargaKustomer(Request $request, $kodeKustomer, $id)
    {
        $kodeKustomer = Kustomer::where('kode', $kodeKustomer)->get();
        $nama = Kustomer::where('kode', $kodeKustomer[0]->kode)->pluck('nama_kustomer');
        $params = $request->except('_token');

        $hargaKustomer = HargaKustomer::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($hargaKustomer, $params) {
            $hargaKustomer->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit harga kustomer [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'edit-harga-kustomer/' . $kodeKustomer[0]->kode . '/' . $id,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Harga kustomer berhasil diupdate');
        } else {
            Session::flash('error', 'Harga kustomer tidak dapat diupdate');
        }

        return redirect('detail-harga-kustomer/' . $kodeKustomer[0]->kode);
    }

    public function deleteHargaKustomer($kodeKustomer, $id)
    {
        $kodeKustomer = Kustomer::where('kode', $kodeKustomer)->get();
        $nama = Kustomer::where('kode', $kodeKustomer[0]->kode)->pluck('nama_kustomer');
        $hargaKustomer = HargaKustomer::findOrFail($id);

        if ($hargaKustomer->delete()) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus harga kustomer [' . $nama[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Harga berhasil dihapus');
        }

        return redirect('detail-harga-kustomer/' . $kodeKustomer[0]->kode);
    }

    public function export_harga($kode)
    {
        return Excel::download(new HargaKustomerExport, 'harga-kustomer-' . $kode . '.xlsx');
    }

    public function import_harga_kustomer(Request $request, $kode)
    {
        $this->validate($request, [
            'import_harga_kustomer' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_harga_kustomer');
        $nama_file = date('d-m-Y') . '-harga-' . $file->getClientOriginalName();
        $folder = 'storage/import_kustomer';
        $file->move($folder, $nama_file);

        Excel::import(new HargaKustomerImport, public_path('/storage/import_kustomer/' . $nama_file));

        Session::flash('success', 'Harga Kustomer Berhasil Diimport!');

        return redirect('detail-harga-kustomer/' . $kode);
    }
}
