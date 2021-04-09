<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Session;

class NotifController extends Controller
{
    public function index()
    {
        $this->middleware('auth');
        parent::__construct();

        $this->data['notifications'] = Notifications::orderBy('created_at', 'DESC')->get();

        return view('admin.notif', $this->data);
    }

    public function nonActive()
    {
        $active = Notifications::where('active', 1)->first();

        if (!empty($active)) {
            Notifications::where('active', 1)->update(['active' => 0]);
        }
    }

    public function cleanNotif()
    {
        $clean = Notifications::all();

        foreach ($clean as $cl) {
            $cl->delete();
        }

        Session::flash('success', 'Semua riwayat notifikasi berhasil dihapus');
        return redirect('notifications');
    }
}
