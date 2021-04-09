<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Notifications;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $activeNotif = Notifications::where('active', 1)->get();
        $checkNotif = Notifications::where('active', 1)->first();
        $notifs = Notifications::orderBy('created_at', 'DESC')->paginate(10);

        $this->data['activeNotif']  = $activeNotif;
        $this->data['checkNotif']  = $checkNotif;
        $this->data['notifs']  = $notifs;
    }
}
