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
                    <h4 class="font-size-18">Harga Kustomer</h4>
                    <!-- <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Veltrix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Data Table</li>
                    </ol> -->
                </div>
            </div>

            <div class="col-sm-6">
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"></h4>

                        @include('partials.flash')
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Kustomer</th>
                                    <th>Wilayah</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($customers as $customer)
                                <tr>
                                    <td>{{$customer->kode}}</td>
                                    <td>{{$customer->nama_kustomer}}</td>
                                    <td>{{$customer->wilayah}}</td>
                                    <td>{{$customer->alamat}}</td>
                                    <td>
                                        <a href="{{ url('detail-harga-kustomer/' . str_replace(' ', '-', $customer->kode)) }}">
                                            <button type="button" class="btn mr-2 btn-outline-warning btn-sm">Detail</button>
                                        </a>
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