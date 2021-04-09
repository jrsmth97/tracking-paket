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
                    <h4 class="font-size-18">Data Kurir</h4>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="{{ url('tambah-kurir') }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">TAMBAH KURIR</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="export_kurir/" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kurirModal">IMPORT EXCEL
                        </button>
                        @include('partials.flash')
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Nama Agen</th>
                                    <th>Kendaraan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($couriers as $courier)
                                <tr>
                                    <td>{{$courier->nama_kurir}}</td>
                                    <td>{{$courier->nama_agen}}</td>
                                    <td>{{$courier->kendaraan}}</td>
                                    <td>
                                        <a href="{{ url('data-kurir/' . $courier->id) }}">
                                            <button type="button" class="btn mr-1 btn-outline-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        {!! Form::open(['url' => 'data-kurir/delete/'. $courier->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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