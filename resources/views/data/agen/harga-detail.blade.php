@extends('layout')

@section('content')
@php
$formTitle = $idAgen[0]->nama_agen;
@endphp
@if(Auth::user()->type != 'admin')
@include('404')
@else
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">{{ $formTitle }}</h4>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="{{ url('tambah-harga/' . $idAgen[0]['kode']) }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">TAMBAH HARGA</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('export_harga_agen/' . $idAgen[0]['kode']) }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hargaAgenModal">IMPORT EXCEL
                        </button>
                        @include('partials.flash')
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Tujuan</th>
                                    <th>Harga Normal</th>
                                    <th>Harga Express</th>
                                    <th>Harga Super Express</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($detailHargaAgen as $detailHa)
                                <tr>
                                    <td>{{$detailHa->tujuan}}</td>
                                    <td>Rp. {{$detailHa->harga_normal}}</td>
                                    <td>Rp. {{$detailHa->harga_express}}</td>
                                    <td>Rp. {{$detailHa->harga_super_express}}</td>
                                    <td>
                                        <a href="{{ url('harga-agen/' . $idAgen[0]->kode . '/' . $detailHa->id) }}">
                                            <button type="button" class="btn mr-1 btn-outline-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        {!! Form::open(['url' => 'delete-harga-agen/'. $idAgen[0]->kode . '/' . $detailHa->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" alt="hapus" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></button>
                                        <!-- {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm', 'onclick' => 'return confirm("do you sure?");']) !!} -->
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @empty
                                <h4 class="card-title">No records found !</h4>
                                @endforelse
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