<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ str_replace('-', ' ', config('app.name', 'Titipan Express Tracking')) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Titipan Express Tracking Dashboard" name="description" />
    <meta content="Titipan Express" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('img') }}/logo2.png">

    <!-- DataTables -->
    <link href="{{ asset('/') }}dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}dashboard/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/dashboard/assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ url('/dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('/dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('/dashboard/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ url('/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @guest

        @else

        @include('partials.topbar')

        @include('partials.sidebar')

        @endguest

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @guest

        <div class="main-content" style="margin-left:0%;margin-top:-5%;">

            @else

            <div class="main-content">

                @endguest

                @yield('content')

                @guest
                <div class="row justify-content-center mb-3">
                    <span><b>Titipan Express Tracking - 2021</b></span>
                </div>
                @else

                @include('partials.footer')

                @include('partials.modal')

                @endguest
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('partials.right-sidebar')

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('/dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('/dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('/dashboard/assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('/') }}dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- Peity chart-->
        <script src="{{ asset('/dashboard/assets/libs/peity/jquery.peity.min.js') }}"></script>

        <!-- Plugin Js-->
        <script src="{{ asset('/') }}dashboard/assets/libs/select2/js/select2.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('/') }}dashboard/assets/js/pages/datatables.init.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/js/pages/form-advanced.init.js"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('/') }}dashboard/assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="{{ asset('/') }}dashboard/assets/js/pages/sweet-alerts.init.js"></script>
        <script src="{{ asset('/') }}dashboard/assets/js/app.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        @php
        $url = \Request::getRequestUri();
        $splitUrl = explode('/', $url);
        @endphp
        @if(count($splitUrl) > 2)
        <script>
            // Ajax Prov and city
            $(document).ready(function() {
                $('select[name="provinsi"]').on('change', function() {
                    var cityId = $(this).val();
                    if (cityId) {
                        $.ajax({
                            url: 'http://127.0.0.1:8000/getCity/ajax/' + cityId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="wilayah"]').empty();
                                $('select[name="wilayah"]').append('<option value="" holder>Pilih Kota/Kabupaten</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="wilayah"]').append(
                                        '<option value="' +
                                        value + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="provinsi"]').empty();
                    }
                });
            });

            // Ajax Notif
            $(document).ready(function() {
                $('.noti-icon').on('click', function() {
                    $('.badge-pill').html('');
                    $.ajax({
                        url: 'http://127.0.0.1:8000/remove-notif/ajax',
                        type: 'GET'
                    });
                });
            });
        </script>
        @else
        <script>
            // Ajax Prov and city
            $(document).ready(function() {
                $('select[name="provinsi"]').on('change', function() {
                    var cityId = $(this).val();
                    if (cityId) {
                        $.ajax({
                            url: 'getCity/ajax/' + cityId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="wilayah"]').empty();
                                $('select[name="wilayah"]').append('<option value="" holder>Pilih Kota/Kabupaten</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="wilayah"]').append(
                                        '<option value="' +
                                        value + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="provinsi"]').empty();
                    }
                });
            });

            // Ajax Notif
            $(document).ready(function() {
                $('.noti-icon').on('click', function() {
                    $('.badge-pill').html('');
                    $.ajax({
                        url: 'remove-notif/ajax',
                        type: 'GET'
                    });
                });
            });
        </script>
        @endif
        @if($url == '/')
        <script>
            const clock = document.querySelector('.clock');

            const tick = () => {
                const now = new Date();
                const h = now.getHours();
                const m = now.getMinutes();
                const s = now.getSeconds();

                const html = `
                <span>${h}</span> :
                <span>${m}</span> :
                <span>${s}</span>
                `
                clock.innerHTML = html;
            }
            setInterval(tick, 1000);
        </script>
        @endif
</body>

</html>