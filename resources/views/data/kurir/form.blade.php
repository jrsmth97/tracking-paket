@extends('layout')

@section('content')

@php
$formTitle = !empty($courier) ? $courier->nama_kurir : 'Tambah Kurir Baru';
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
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h2></h2>
                        @include('partials.flash', ['$errors' => $errors])
                        @if (!empty($courier))
                        {!! Form::model($courier, ['url' => ['data-kurir', $courier->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                        @else
                        {!! Form::open(['url' => 'tambah-kurir']) !!}
                        @endif
                        @csrf
                        <h3>&nbsp;</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Kurir</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('nama_kurir', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kendaraan</label>
                                    <div class="col-lg-9">
                                        @if(!empty($courier))
                                        {!! Form::text('kendaraan', null, ['class' => 'form-control', 'readonly' => true]) !!}
                                        @else
                                        <select id="inputState" name="kendaraan" class="form-control" required>
                                            <option holder>Pilih Kendaraan</option>
                                            <option value="Sepeda Motor">Sepeda Motor</option>
                                            <option value="Mobil Pick Up">Mobil Pick Up</option>
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Handphone</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('no_hp', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Merk Kendaraan</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('merk_kendaraan', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Agen</label>
                                    <div class="col-lg-9">
                                        <select id="inputState" name="nama_agen" class="form-control" required>
                                            @if(!empty($courier))
                                            @foreach($agens as $agen)
                                            <option value="{{$agen->nama_agen}}" {{ $agen->nama_agen == $courier->nama_agen ? 'selected' : '' }}>{{$agen->nama_agen}}</option>
                                            @endforeach
                                            @else
                                            <option holder>Pilih Agen</option>
                                            @foreach($agens as $agen)
                                            <option value="{{$agen->nama_agen}}">{{$agen->nama_agen}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Plat Kendaraan</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('no_plat', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Username Kurir</label>
                                    <div class="col-lg-9">
                                        @if(!empty($courier))
                                        {!! Form::text('username' , $account[0]->username , ['class' => 'form-control']) !!}
                                        @else
                                        <input name="username" type="text" class="form-control" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(empty($courier))
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Password Kurir</label>
                                    <div class="col-lg-9">
                                        <input name="password" type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="float-right col-md-6">
                                <div class="form-group row">
                                    <label for="txtAddress2Billing" class="col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'style' => 'max-height: 100px;']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                        <a href="{{ url('data-kurir') }}">
                            <button style="float:right;" type="button" class="btn mr-2 btn-outline-warning btn-lg">BACK</button>
                        </a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endif
@endsection