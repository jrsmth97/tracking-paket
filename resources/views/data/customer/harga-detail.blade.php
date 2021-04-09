@extends('layout')

@section('content')
@php
$formTitle = $idKustomer[0]->nama_kustomer;
@endphp

@if(Auth::user()->type == 'kurir')
@include('404')
@else
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h3>{{ $formTitle }}</h3>
                </div>
            </div>

            @if(Auth::user()->type == 'admin')
            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="{{ url('tambah-harga-kustomer/' . $idKustomer[0]['kode']) }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">TAMBAH HARGA</button>
                    </a>
                </div>
            </div>
            @endif
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('export_harga_kustomer/' . $idKustomer[0]['kode']) }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                        @if(Auth::user()->type == 'admin')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hargaKustomerModal">IMPORT EXCEL
                        </button>
                        @endif
                        @include('partials.flash')
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Tujuan</th>
                                    <th>Harga Normal</th>
                                    <th>Harga Express</th>
                                    <th>Harga Super Express</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($detailHargaKustomer as $detailHk)
                                <tr>
                                    <td>{{$detailHk->tujuan}}</td>
                                    <td>
                                        <ul>
                                            <li>Rp. {{$detailHk->harga_normal}}</li>
                                            <li>EDD : {{$detailHk->edd_normal}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Rp. {{$detailHk->harga_express}}</li>
                                            <li>EDD : {{$detailHk->edd_express}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Rp. {{$detailHk->harga_super_express}}</li>
                                            <li>EDD : {{$detailHk->edd_super_express}}</li>
                                        </ul>
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ url('edit-harga-kustomer/' . $idKustomer[0]->kode . '/' . $detailHk->id) }}">
                                            <button type="button" class="btn mr-1 btn-outline-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        {!! Form::open(['url' => 'delete-harga-kustomer/'. $idKustomer[0]->kode . '/' . $detailHk->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" alt="hapus" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></button>
                                        <!-- {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm']) !!} -->
                                        {!! Form::close() !!}
                                    </td>
                                    @endif
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