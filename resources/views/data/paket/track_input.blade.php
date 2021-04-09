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
                    <h4 class="font-size-18">Track Input No : {{ $paket[0]->no_stt }}</h4>
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
                        <form action="{{ url('track-input/' . $paket[0]->no_stt) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Lokasi Paket</label>
                                        <div class="col-lg-9">
                                            <select name="provinsi" class="form-control select2" required>
                                                <option holder>Pilih Provinsi</option>
                                                @foreach($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->province }}</option>
                                                @endforeach
                                            </select>
                                            <select name="wilayah" id="tujuan" class="form-control select2 mt-4" required>
                                                <option selected holder>Pilih Kota/Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3 col-form-label">Nama Kurir</label>
                                        <div class="col-lg-9">
                                            <select name="kurir" class="form-control select2" required>
                                                <option holder>Nama Kurir</option>
                                                @foreach($kurir as $kr)
                                                <option value="{{ $kr->nama_kurir }}">{{ $kr->nama_kurir }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Detail</label>
                                        <div class="col-lg-9">
                                            {!! Form::textarea('detail', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Foto</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="track_photo" class="filestyle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                            <a href="{{ url('data-kurir') }}">
                                <button style="float:right;" type="button" class="btn mr-2 btn-outline-warning btn-lg">BACK</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endif
@endsection