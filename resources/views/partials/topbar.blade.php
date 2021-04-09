<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <br>
                    <span class="logo-sm">
                        <img src="{{ asset('img') }}/logo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('img') }}/logo.png" alt="" height="17">
                    </span>
                </a>

                <a href="{{ url('/') }}" class="logo logo-light">
                    <br>
                    <span class="logo-sm">
                        <img width="200" src="{{ asset('img') }}/logo.png" alt="">
                    </span>
                    <span class="logo-lg">
                        <img width="200" src="{{ asset('img') }}/logo.png" alt="">
                    </span>
                </a>
            </div>

            <button type="button" class="mt-2 btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="fas fa-align-justify mptop-5"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    @if($checkNotif != null)
                    <span class="badge badge-danger badge-pill">{{ count($activeNotif) }}</span>
                    @else
                    <span class="badge badge-danger badge-pill"></span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notifikasi </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @php
                        use Carbon\Carbon;
                        @endphp
                        @forelse($notifs as $notif)
                        <a href="{{ $notif->action != null ? url(htmlspecialchars($notif->action)) : '#' }}" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-warning rounded-circle font-size-16">
                                        <i class="mdi mdi-bell-ring-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <small class="mt-0 mb-1 f-700">{{ Carbon::parse($notif->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                    <div class="font-size-12">
                                        <p class="mb-1"><b>{{ $notif->name == Auth::user()->nama ? 'Anda' : $notif->name }}</b> {{ $notif->messages }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        No Notifications found !
                        @endforelse
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="{{ url('notifications') }}">
                            Lihat Semua Notifikasi
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> {{ Auth::user()->username }}</a>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt mr-3"></i>{{ __('LOGOUT') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-settings-outline"></i>
                </button>
            </div>

        </div>
    </div>
</header>