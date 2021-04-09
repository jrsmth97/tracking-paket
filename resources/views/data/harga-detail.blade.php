@extends('layout')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h3>Harga General</h3>
                </div>
            </div>

            @if(Auth::user()->type == 'admin')
            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="{{ url('tambah-harga-general') }}">
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
                        <a href="{{ url('export_harga_general') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                        @if(Auth::user()->type == 'admin')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hargaGeneralModal">IMPORT EXCEL
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
                                @forelse($hargaGeneral as $hg)
                                <tr>
                                    <td>{{$hg->tujuan}}</td>
                                    <td>
                                        <ul>
                                            <li>Rp. {{$hg->harga_normal}}</li>
                                            <li>EDD : {{$hg->edd_normal}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Rp. {{$hg->harga_express}}</li>
                                            <li>EDD : {{$hg->edd_express}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Rp. {{$hg->harga_super_express}}</li>
                                            <li>EDD : {{$hg->edd_super_express}}</li>
                                        </ul>
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ url('edit-harga-general/' . $hg->id) }}">
                                            <button type="button" class="btn mr-2 btn-outline-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        {!! Form::open(['url' => 'delete-harga-general/' . $hg->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" alt="hapus" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></button>
                                        <!-- {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm', 'onclick' => 'return confirm("do you sure?");']) !!} -->
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
@endsection