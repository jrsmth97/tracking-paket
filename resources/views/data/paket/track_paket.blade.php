@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right d-md-block" target="_blank" href="{{ url('print-paket/' . $paket[0]->no_stt) }}">
                            <button type="button" class="btn btn-outline-warning btn-lg mb-5">CETAK RESI</button>
                        </a>
                        <h2 class="d-none d-md-block">Tracking Paket : {{ $paket[0]->no_stt }}</h2>
                        @include('partials.flash', ['$errors' => $errors])
                        <div class="table-responsive mt-5">
                            <table class="table table-hover table-centered table-stripped table-nowrap mb-0">
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th scope="col">STT Number</th>
                                        <th scope="col">Jenis Pelayanan</th>
                                        <th scope="col">Tanggal Pengiriman</th>
                                        <th scope="col">Asal</th>
                                        <th scope="col">Tujuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $paket[0]->no_stt }}</th>
                                        <td>{{ strtoupper(str_replace('harga_', '', $paket[0]->pelayanan)) }}</td>
                                        <td>{{ date('d M Y', strtotime($cost[0]->tanggal_pickup)) }}</td>
                                        <td>{{ $wilayahKustomer[0] }}</td>
                                        <td>{{ $paket[0]->kota_tujuan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered table-striped table-nowrap">
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th>Pengirim</th>
                                        <th>Agen</th>
                                        <th>Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $paket[0]->kustomer }}</td>
                                        <td>{{ $paket[0]->agen_perwakilan }}</td>
                                        <td>{{ $paket[0]->tujuan }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $paket[0]->alamat_pengirim }}</td>
                                        <td>{{ $alamatAgen[0] }}</td>
                                        <td>{{ $paket[0]->alamat_penerima }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Riwayat Pengiriman Paket</h3>
                        <ol class="activity-feed">
                            @forelse($track as $tr)
                            <li class="feed-item">
                                <div class="row">
                                    <div class="col-md-6 col-lg-8 feed-item-list" style="display:grid;">
                                        <span class="date"><strong class="f-700">{{ date('d-M-Y H:i:s', strtotime($tr['created_at'])) }}</strong></span>
                                        <span class="activity-text mt-3">Paket berada di <strong class="f-700">{{ $tr['lokasi'] }}</strong></span>
                                        <span class="mt-2">Kurir: <strong class="f-700">{{ $tr['kurir'] }}</strong></span>
                                        <span class="activity-text mt-4">Keterangan : {{ $tr['detail'] == null ? '-' : $tr['detail'] }}</span>
                                    </div>
                                    <div class="col-md-4 col-lg-3 mr-0">
                                        <a href="{{ url('/' . $tr['photo']) }}" onclick="window.open('{{ url("/" . $tr["photo"]) }}', 'Photo','width=450,height=650');return false;">
                                            <img width="120" src="{{ url('/' . $tr['photo']) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @empty
                            Tidak ada data tracking !
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection