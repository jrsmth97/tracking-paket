@extends('layout')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        @guest
        @else
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h2>Masukan no STT anda</h2>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                </div>
            </div>
        </div>
        @endguest
        <!-- end page title -->
        @guest
        <div class="row justify-content-center" style="display:grid;margin-top:10%;filter: drop-shadow(2px 4px 6px black);">
            <img width="255" class="mb-3 d-flex" style="justify-self: center;max-height:100px;" src="{{ asset('img') }}/logo.png">
            @else
            <div class="row">
                @endguest
                @guest
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-7 d-inline">
                            <form class="form-inline" action="{{ url('track-paket') }}" method="post">
                                @csrf
                                <div class="form-group mb-2 mr-1 mt-1">
                                    <label class="f-700" style="font-family:serif;">Cari Nomor STT</label>
                                </div>
                                <div class="form-group mx-sm-4 mb-2" style="margin-left:2%;">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <input name="track_stt" type="text" class="form-control" placeholder="ex : 2020100293" required>
                                </div>
                                <button type="submit" class="track-bt btn btn-outline-info mb-2">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>

                @else
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h2></h2>
                            @include('partials.flash', ['$errors' => $errors])
                            <form action="{{ url('track-paket') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="f-700 control-label col-lg-3 col-form-label">NO STT</label>
                                            <div class="col-lg-9">
                                                {!! Form::text('track_stt', null, ['class' => 'form-control', 'placeholder' => 'ex : 2020100293', 'required' => true]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-outline-primary btn-lg">CARI</button>
                                    </div>
                                </div>
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    @endsection