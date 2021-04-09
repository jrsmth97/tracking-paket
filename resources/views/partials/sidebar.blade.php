<div class="vertical-menu mt-3">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if(Auth::user()->type == 'kustomer')
                <li class="menu-title mt-5">Welcome, {{ Auth::user()->nama }}</li>

                <li>
                    <a href="{{ url('/track-paket') }}" class="waves-effect">
                        <i class="ti-zoom-in"></i>
                        <span>Track Paket</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-money"></i>
                        <span>Harga</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('detail-harga-kustomer/' . Auth::user()->kode) }}">Harga {{ Auth::user()->nama }}</a></li>
                        <li><a href="{{ url('harga-general') }}">Harga General</a></li>
                    </ul>
                </li>

                @elseif(Auth::user()->type == 'kurir')

                <li class="menu-title mt-5">Welcome, {{ Auth::user()->nama }}</li>
                <li>
                    <a href="{{ url('/track-paket') }}" class="waves-effect">
                        <i class="ti-zoom-in"></i>
                        <span>Track Paket</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/harga-general') }}" class="waves-effect">
                        <i class="ti-money"></i>
                        <span>Harga General</span>
                    </a>
                </li>

                @else

                <li class="menu-title mt-3">Welcome, {{ Auth::user()->nama }}</li>

                <li>
                    <a href="{{ url('/') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-pie-chart"></i>
                        <span>Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('data-agen') }}">Data Agen</a></li>
                        <li><a href="{{ url('data-kustomer') }}">Data Kustomer</a></li>
                        <li><a href="{{ url('data-kurir') }}">Data Kurir</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-money"></i>
                        <span>Harga</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('harga-agen') }}">Harga Agen</a></li>
                        <li><a href="{{ url('harga-kustomer') }}">Harga Kustomer</a></li>
                        <li><a href="{{ url('harga-general') }}">Harga General</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>Paket</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('track-paket') }}">Track Paket</a></li>
                        <li><a href="{{ url('daftar-paket') }}">Daftar Paket</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Login Account</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin') }}">Admin</a></li>
                        <li><a href="{{ url('users') }}">Users</a></li>
                    </ul>
                </li>

                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->