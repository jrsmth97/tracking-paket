@extends('layout')

@section('content')

@php
$formTitle = !empty($customer) ? $customer->nama_kustomer : 'Tambah Kustomer Baru';
$bgGray = 'background: #d8d8d8;';
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
                        @if (!empty($customer))
                        {!! Form::model($customer, ['url' => ['data-kustomer', $customer->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                        @else
                        {!! Form::open(['url' => 'tambah-kustomer']) !!}
                        @endif
                        @csrf
                        <h3>&nbsp;</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="kode" class="col-lg-3 col-form-label">Kode</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('kode', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Wilayah</label>
                                    <div class="col-lg-9">
                                        @if (!empty($customer))
                                        {!! Form::text('wilayah', null, ['class' => 'form-control', 'disabled' => true, 'style' => $bgGray]) !!}
                                        @else
                                        <select id="inputState" name="provinsi" class="form-control" required>
                                            <option holder>Pilih Provinsi</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->province }}</option>
                                            @endforeach
                                        </select>
                                        <select id="inputState" name="wilayah" class="form-control mt-2" required>
                                            <option value="">Pilih Kota/Kabupaten</option>
                                        </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama Kustomer</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('nama_kustomer', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">FAX</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">Telepon</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('telepon', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">Username</label>
                                    <div class="col-lg-9">
                                        @if(!empty($customer))
                                        {!! Form::text('username' , $account[0]['username'] , ['class' => 'form-control', 'required' => true]) !!}
                                        @else
                                        <input name="username" type="text" class="form-control" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">Telepon Seluler</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('telepon_seluler', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            @if(empty($customer))
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Password Kustomer</label>
                                    <div class="col-lg-9">
                                        <input id="txtCompanyBilling" name="password" type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtCityBilling" class="col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="txtAddress2Billing" class="col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'style' => 'max-height:100px;', 'required' => true]) !!}
                                    </div>
                                </div>
                                <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                                <a href="{{ url('data-kustomer') }}">
                                    <button style="float:right;" type="button" class="btn mr-2 btn-outline-warning btn-lg">BACK</button>
                                </a>
                            </div>
                        </div>
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