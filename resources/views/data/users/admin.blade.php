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
                    <h4 class="font-size-18">Admin Account</h4>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">TAMBAH ADMIN</button>
                    </a>
                </div>
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{$user->nama}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <!-- <a href="{{ url('data-agen') }}">
                                            <button type="button" class="btn mr-2 btn-outline-warning btn-sm">Edit</button>
                                        </a> -->
                                        {!! Form::open(['url' => 'admin/delete/'. $user->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" alt="hapus" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></button>
                                        <!-- {!! Form::submit('remove', ['class' => 'btn btn-outline-danger btn-sm']) !!} -->
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