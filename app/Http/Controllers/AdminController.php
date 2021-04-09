<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\HargaGeneralExport;
use App\Imports\HargaGeneralImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\HargaGeneral;
use App\Models\HargaKustomer;

use App\Models\Agen;
use App\Models\Cities;
use App\Models\Provinces;
use App\Models\Kustomer;
use App\Models\Users;
use App\Models\Kurir;
use App\Models\Paket;
use App\Models\Notifications;

use Session;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();

        $this->data['wilayah']  = Agen::pluck('wilayah');
    }

    public function index()
    {
        $agen = Agen::all();
        $kurir = Kurir::all();
        $kustomer = Kustomer::all();
        $paket = Paket::all();

        $time = date('H.i');
        $greet = 'Halo';
        if ($time >= 4 && $time < 11) {
            $greet = 'Selamat pagi';
            $bg = "background:url(" . url('img/morning.jpg') . ");";
        } else if ($time >= 11 && $time < 15) {
            $greet = 'Selamat siang';
            $bg = "background:url(" . url('img/afternoon.jpg') . ");";
        } else if ($time >= 15 && $time <= 18.30) {
            $greet = 'Selamat sore';
            $bg = "background:url(" . url('img/evening.jpg') . ");";
        } else {
            $greet = 'Selamat malam';
            $bg = "background:url(" . url('img/night.jpg') . ");";
        }

        return view('admin.index', compact('agen', 'kurir', 'kustomer', 'paket', 'greet', 'bg'), $this->data);
    }

    public function hargaGeneral()
    {
        $hargaGeneral = HargaGeneral::orderBy('id', 'DESC')->paginate(10);

        return view('data.harga-detail', compact('hargaGeneral'), $this->data);
    }

    public function createHargaGeneral()
    {
        $provinces = Provinces::all();

        return view('data.form-harga', compact('provinces'), $this->data);
    }

    public function storeHargaGeneral(Request $request)
    {
        $this->validate($request, [
            'wilayah' => 'required',
            'harga_normal' => 'required|numeric',
            'edd_normal' => 'required',
        ]);

        $general = HargaGeneral::create([
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
            'messages' => 'telah menambahkan harga general baru [' . $request->wilayah . ']',
            'active' => 1,
            'action' => 'harga-general',
        ]);

        if ($general && $notif) {
            Session::flash('success', 'Harga agen berhasil ditambahkan');
        } else {
            Session::flash('error', 'Error, tidak bisa menambahkan harga agen !');
        }

        return redirect('harga-general');
    }

    public function editHargaGeneral($id)
    {
        $hargaGeneral = HargaGeneral::findOrFail($id);

        $this->data['kodeGeneral'] = $hargaGeneral->toArray();

        return view('data.form-harga', $this->data);
    }

    public function updateHargaGeneral(Request $request, $id)
    {
        $params = $request->except('_token');
        $tujuan = HargaGeneral::where('id', $id)->pluck('tujuan');
        $harga = HargaGeneral::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($harga, $params) {
            $harga->update($params);

            return true;
        });
        $notif = Notifications::create([
            'name' => \Auth::user()->nama,
            'messages' => 'telah mengedit harga general [' . $tujuan[0] . ']',
            'active' => 1,
            'action' => 'edit-harga-general/' . $id,
        ]);

        if ($saved && $notif) {
            Session::flash('success', 'Harga berhasil diupdate');
        } else {
            Session::flash('error', 'Harga tidak dapat diupdate');
        }

        return redirect('harga-general');
    }

    public function deleteHargaGeneral($id)
    {
        $tujuan = HargaGeneral::where('id', $id)->pluck('tujuan');
        $harga = HargaGeneral::findOrFail($id);

        if ($harga->delete()) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus harga general [' . $tujuan[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Harga berhasil dihapus');
        }

        return redirect('harga-general');
    }

    public function export_harga_general()
    {
        return Excel::download(new HargaGeneralExport, 'harga-general.xlsx');
    }

    public function import_harga_general(Request $request)
    {
        $this->validate($request, [
            'import_harga_general' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_harga_general');
        $nama_file = date('d-m-Y') . '-harga-' . $file->getClientOriginalName();
        $folder = 'storage/import_general';
        $file->move($folder, $nama_file);

        Excel::import(new HargaGeneralImport, public_path('/storage/import_general/' . $nama_file));

        Session::flash('success', 'Harga General Berhasil Diimport!');

        return redirect('harga-general');
    }


    public function admin()
    {
        $users = Users::where('type', 'admin')->orderBy('id', 'DESC')->paginate(10);

        $this->data['users'] = $users;

        return view('data.users.admin', $this->data);
    }

    public function user()
    {
        $users = Users::where('type', '<>', 'admin')->orderBy('id', 'DESC')->paginate(10);

        return view('data.users.user', compact('users'), $this->data);
    }

    public function deleteAdmin($id)
    {
        $users = Users::findOrFail($id);
        $admin = Users::where('id', $id)->pluck('username');

        if ($users->delete()) {
            Notifications::create([
                'name' => \Auth::user()->nama,
                'messages' => 'telah menghapus admin [' . $admin[0] . ']',
                'active' => 1,
            ]);
            Session::flash('success', 'Admin berhasil dihapus');
        }

        return redirect('/admin');
    }

    public function ajax($id)
    {
        $cities = Cities::where('province_id', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }

    public function ajaxHarga($tujuan, $tipe, $kode)
    {
        $cekHarga = HargaKustomer::where(['tujuan' => ucwords(str_replace('%20', ' ', $tujuan)), 'kode' => $kode])->first();

        if ($cekHarga != null) {
            $hargaKustomer = HargaKustomer::where(['tujuan' => ucwords(str_replace('%20', ' ', $tujuan)), 'kode' => $kode])->pluck($tipe);
            return json_encode($hargaKustomer);
        } else {
            $harga = HargaGeneral::where('tujuan', ucwords(str_replace('%20', ' ', $tujuan)))->pluck($tipe);
            return json_encode($harga);
        }
    }
}
