@extends('layout')

@section('content')

@php
$formTitle = !empty($agen) ? $agen->nama_agen : 'Tambah Agen Baru';
$disableInput = !empty($wilayah) ? true : false;
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
                    <ol class="breadcrumb mb-0">
                    </ol>
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
                        @if (!empty($agen))
                        {!! Form::model($agen, ['url' => ['data-agen', $agen->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                        @else
                        {!! Form::open(['url' => 'tambah-agen/']) !!}
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
                                    <label for="telepon_seluler" class="col-lg-3 col-form-label">Telepon Seluler</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('telepon_seluler', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="nama_agen" class="col-lg-3 col-form-label">Nama Agen</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('nama_agen', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="provinsi" class="col-lg-3 col-form-label">Wilayah</label>
                                    <div class="col-lg-9">
                                        @if(empty($agen))
                                        <select id="inputState" name="provinsi" class="form-control" required>
                                            <option holder>Pilih Provinsi</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->province }}</option>
                                            @endforeach
                                        </select>
                                        <select id="inputState" name="wilayah" class="form-control" required>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                        @else
                                        {!! Form::text('wilayah', null, ['class' => 'form-control', 'disabled' => true]) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="telepon" class="col-lg-3 col-form-label">Telepon</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('telepon', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="alamat" class="col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'required' => true]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                        <a href="{{ url('data-agen') }}">
                            <button style="float:right;" type="button" class="btn mr-2 btn-outline-warning btn-lg">BACK</button>
                        </a>
                        {!! Form::close() !!}
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endif
@endsection