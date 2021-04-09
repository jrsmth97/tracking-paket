@extends('layout')

@section('content')
@php
$formTitle = !empty($kodeGeneral) ? 'Harga tujuan ' . $kodeGeneral['tujuan'] : 'Tambah Harga Baru';
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
                    <h3>{{ $formTitle }}</h3>
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
                        <!-- <h2>{{ $formTitle }}</h2> -->
                        @include('partials.flash', ['$errors' => $errors])
                        @if (!empty($kodeGeneral))
                        {!! Form::model($kodeGeneral, ['url' => ['edit-harga-general', $kodeGeneral['id']], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                        @else
                        <form action="{{ url('tambah-harga-general') }}" method="post">
                            @endif
                            @csrf
                            <h3>&nbsp;</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Tujuan</label>
                                        <div class="col-lg-9">
                                            @if(!empty($kodeGeneral))
                                            {!! Form::text('tujuan', null, ['class' => 'form-control', 'readonly' => true, 'style' => $bgGray]) !!}
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
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Harga Normal</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('harga_normal', null, ['class' => 'form-control', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">EDD Normal (Dalam Hari)</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('edd_normal', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 1 - 3 Hari', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Harga Express</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('harga_express', null, ['class' => 'form-control', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">EDD Express (Dalam Hari)</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('edd_express', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 1 - 3 Hari', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Harga Super Express</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('harga_super_express', null, ['class' => 'form-control', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">EDD Super Express (Dalam Hari)</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('edd_super_express', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 1 - 3 Hari', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                                    <a href="{{ url('harga-general') }}">
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