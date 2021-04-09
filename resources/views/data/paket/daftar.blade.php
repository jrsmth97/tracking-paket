@extends('layout')

@section('content')

@if(Auth::user()->type != 'admin')
@include('404')
@else
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h2>Daftar Paket</h2>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="{{ url('tambah-paket') }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">TAMBAH PAKET</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div style="overflow-x:scroll;" class="card-body">
                        @include('partials.flash', ['$errors' => $errors])
                        <a href="export_paket/" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paketModal">IMPORT EXCEL
                        </button>
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 120%;overflow-x:scroll;">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>No. STT</th>
                                    <th>Kustomer</th>
                                    <th>Agen Perwakilan</th>
                                    <th>Tujuan</th>
                                    <th>Tipe Paket</th>
                                    <th>Tanggal</th>
                                    <th>Tarif</th>
                                    <th>Berat</th>
                                    <th>Koli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pakets as $paket)
                                @foreach($paket->cost as $pc)
                                @foreach($paket->detail as $pd)
                                <tr>
                                    <td>{{ $paket->no_stt }}</td>
                                    <td>{{ $paket->kustomer }}</td>
                                    <td>{{ $paket->agen_perwakilan }}</td>
                                    <td>{{ $paket->tujuan }}</td>
                                    <td>
                                        <ul style="list-style-type: none;margin-left:-30px;">
                                            <li>TIPE: {{ $paket->tipe_paket }}</li>
                                            <li class="d-paket">PAYMENT: {{ $pc->pembayaran }}</li>
                                            <li>SERVICE: {{ strtoupper(str_replace('harga_', '', $paket->pelayanan)) }}</li>
                                        </ul>
                                    </td>
                                    <td class="d-paket">{{ date('d-M-Y', strtotime($pc->tanggal_input)) }}</td>
                                    <td class="d-paket">Rp. {{ number_format($pc->total_harga) }}</td>
                                    <td class="d-paket">{{ $pd->berat }} Kg</td>
                                    <td class="d-paket">{{ $pd->koli }} Koli</td>
                                    <td>
                                        <a href="{{ url('edit-paket/' . $paket->no_stt) }}">
                                            <button type="button" class="btn mr-1 btn-outline-warning btn-sm" alt="edit"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        <a href="{{ url('track-input/' . $paket->no_stt) }}">
                                            <button type="button" class="btn mr-1 btn-outline-primary btn-sm" name="tracking-input"><i class="fas fa-truck-pickup"></i></button>
                                        </a>
                                        <a href="{{ url('track-paket/' . $paket->no_stt) }}">
                                            <button type="button" class="btn mr-1 btn-outline-success btn-sm" alt="tracking"><i class="fas fa-search-plus"></i></button>
                                        </a>
                                        <a target="_blank" href="{{ url('print-paket/' . $paket->no_stt) }}">
                                            <button type="button" class="btn mr-1 btn-outline-info btn-sm" alt="print"><i class="fas fa-print"></i></button>
                                        </a>
                                        <!-- {!! Form::open(['url' => 'delete-paket/'. $paket->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" alt="hapus" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></button>
                                        {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm', 'onclick' => 'return confirm("do you sure?");']) !!}
                                        {!! Form::close() !!} -->
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endif
@endsection