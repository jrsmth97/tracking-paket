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
                    <h4 class="font-size-18">Form Wizard</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Veltrix</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Wizard</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-settings mr-2"></i> Settings
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Tambah Harga Kustomer</h2>

                        <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                            <h3>&nbsp;</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Agen</label>
                                        <div class="col-lg-9">
                                            <select id="inputState" class="form-control">
                                                <option holder>Pilih Kustomer</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Provinsi Tujuan</label>
                                        <div class="col-lg-9">
                                            <select id="inputState" class="form-control">
                                                <option holder>Pilih Provinsi</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Harga Normal</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Normal EDD</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Harga Express</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Express EDD</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Harga Super Express</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Super Express EDD</label>
                                        <div class="col-lg-9">
                                            <input id="txtFirstNameBilling" name="txtFirstNameBilling" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                                    <a href="{{ url('harga-kustomer') }}">
                                        <button style="float:right;" type="button" class="btn mr-2 btn-outline-warning btn-lg">BACK</button>
                                    </a>
                                </div>
                            </div>
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