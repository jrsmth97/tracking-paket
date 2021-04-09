@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid" style="{{ $bg }}background-size:cover;">
        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h2 class="main-menu">Tracking Dashboard</h2>
                    <hr style="width:79vw;">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">
                            <h4 class="text-primary">{{ $greet . ' , ' . Auth::user()->nama }}</h4>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <div class="clock">
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if(Auth::user()->type == 'admin')
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info text-white">
                    <a class="text-light" href="{{ url('data-agen') }}">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <i class="fas fa-building text-light mt-3" style="font-size:xx-large;"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Agen</h5>
                                <h4 class="font-weight-medium font-size-24">{{ count($agen) }}</h4>
                            </div>
                            <div class="pt-2">
                                <div class="float-right">
                                    <a href="{{ url('data-agen') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Lihat Detail</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-success text-white">
                    <a class="text-light" href="{{ url('data-kustomer') }}">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <i class="fas fa-user-tie text-light mt-3" style="font-size:xx-large;"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Kustomer</h5>
                                <h4 class="font-weight-medium font-size-24">{{ count($kustomer) }}</h4>
                            </div>
                            <div class="pt-2">
                                <div class="float-right">
                                    <a href="{{ url('data-kustomer') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Lihat Detail</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <a class="text-light" href="{{ url('data-kurir') }}">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <i class="fas fa-user-astronaut text-light mt-3" style="font-size:xx-large;"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Kurir</h5>
                                <h4 class="font-weight-medium font-size-24">{{ count($kurir) }}</h4>
                            </div>
                            <div class="pt-2">
                                <div class="float-right">
                                    <a href="{{ url('data-kustomer') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Lihat Detail</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-danger text-white">
                    <a class="text-light" href="{{ url('daftar-paket') }}">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <i class="fas fa-box-open text-light mt-3" style="font-size:xx-large;"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Daftar Paket</h5>
                                <h4 class="font-weight-medium font-size-24">{{ count($paket) }}</h4>
                            </div>
                            <div class="pt-2">
                                <div class="float-right">
                                    <a href="{{ url('daftar-paket') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Lihat Detail</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endif

    </div> <!-- container-fluid -->
</div>
@endsection