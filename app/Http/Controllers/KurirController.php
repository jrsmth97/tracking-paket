<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KurirRequest;

use Illuminate\Support\Facades\Hash;
use App\Exports\KurirExport;
use App\Imports\KurirImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Agen;
use App\Models\Users;
use App\Models\Kurir;
use App\Models\Notifications;

use Session;
use DB;

class KurirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    public function dataKurir()
    {
        $couriers = Kurir::orderBy('id', 'DESC')->paginate(10);

        return view('data.kurir.index', compact('couriers'), $this->data);
    }

    public function createKurir()
    {
        $agens = Agen::all();

        return view('data.kurir.form', compact('agens'), $this->data);
    }

    public function storeKurir(KurirRequest $request)
    {
        $kurir = Kurir::create([
            'nama_kurir' => $request->nama_kurir,
            'nama_agen' => $request->nama_agen,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kendaraan' => $request->kendaraan,
            'merk_kendaraan' => $request->merk_kendaraan,
            'no_plat' => $request->no_plat,
        ]);
        $userKurir = Users::create([
            'type' => 'kurir',
            'nama' => $request->nama_kurir,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah menambahkan kurir baru [' . $request->nama_kurir . ']',
            'active' => 1,
            'action' => 'data-kurir'
        ]);

        if ($kurir && $userKurir && $notif) {
            Session::flash('success', 'Kustomer berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan agen !');
        }

        return redirect('data-kurir');
    }

    public function editKurir($id)
    {
        $courier = Kurir::findOrFail($id);
        $couriers = Kurir::orderBy('id', 'DESC')->get();
        $agens = Agen::orderBy('id', 'DESC')->get();
        $account = Users::where('nama', $couriers[0]->nama_kurir)->get();

        $this->data['couriers'] = $couriers->toArray();
        $this->data['courier'] = $courier;
        $this->data['agens'] = $agens;
        $this->data['account'] = $account;

        return view('data.kurir.form', $this->data);
    }

    public function updateKurir(Request $request, $id)
    {
        $params = $request->except('_token');

        $nama = Kurir::where('id', $id)->pluck('nama_kurir');
        $kurir = Kurir::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($kurir, $params) {
            $kurir->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit kurir [' . $nama[0] . ']',
            'active' => 1,
            'action' => 'data-kurir/' . $id,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Kurir berhasil diupdate');
        } else {
            Session::flash('error', 'Kurir tidak dapat diupdate');
        }

        return redirect('data-kurir');
    }

    public function deleteKurir($id)
    {
        $nama = Kurir::where('id', $id)->pluck('nama_kurir');
        $couriers = Kurir::findOrFail($id);
        $akun = Users::where('nama', $nama[0])->delete();
        if ($couriers->delete() && $akun) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus kurir [' . $nama[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Kurir berhasil dihapus');
        }

        return redirect('data-kurir');
    }

    public function export_kurir()
    {
        return Excel::download(new KurirExport, 'daftar-kurir.xlsx');
    }

    public function import_kurir(Request $request)
    {
        $this->validate($request, [
            'import_kurir' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_kurir');
        $nama_file = date('d-m-Y') . $file->getClientOriginalName();
        $folder = 'storage/import_kurir';
        $file->move($folder, $nama_file);

        Excel::import(new KurirImport, public_path('/storage/import_kurir/' . $nama_file));

        Session::flash('success', 'Kurir Berhasil Diimport!');

        return redirect('data-kurir');
    }
}
