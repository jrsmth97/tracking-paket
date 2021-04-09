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
    <link rel="shortcut icon" href="{{ asset('/') }}dashboard/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('/') }}dashboard/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/') }}dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/') }}dashboard/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="authentication-bg d-flex align-items-center pb-0 vh-100">
        <div class="content-center w-100">
            <div class="container">
                <div class="card mo-mt-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-4 ml-auto">
                                <div class="ex-page-content">
                                    <h1 class="text-dark display-1 mt-4">404!</h1>
                                    <h4 class="mb-4">Maaf, halaman yang anda cari tidak ada</h4>
                                    @guest
                                    <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{ route('login') }}"><i class="mdi mdi-home"></i> Kembali ke halaman login</a>
                                    @else
                                    @if (Route::has('login') && Auth::user()->type == 'admin')
                                    <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{ url('/') }}"><i class="mdi mdi-home"></i> Kembali ke dashboard</a>
                                    @endif
                                    @endguest
                                </div>

                            </div>
                            <div class="col-lg-5 mx-auto">
                                <img src="{{ asset('/') }}dashboard/assets/images/error.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/') }}dashboard/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/') }}dashboard/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('/') }}assets/js/app.js"></script>

</body>

</html>