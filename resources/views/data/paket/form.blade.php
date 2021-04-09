@extends('layout')

@section('content')
@php
$formTitle = !empty($paket) ? 'No STT Paket : ' . $paket[0]['no_stt'] : 'Tambah Paket Baru';
$bgGray = 'background: #d8d8d8;';
@endphp

@if(Auth::user()->type != 'admin')
@include('404')
@else
<div class="page-content">
    <div class="container-fluid">
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @include('partials.flash', ['$errors' => $errors])
                        <h2>{{$formTitle}}</h2>
                        @if (!empty($paket))
                        {!! Form::model($paket[0], ['url' => ['edit-paket', $paket[0]['id']], 'method' => 'PUT']) !!}
                        {!! Form::hidden('no_stt') !!}
                        @else
                        <form action="{{ url('tambah-paket') }}" method="post" id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                            @endif
                            @csrf
                            <h3>&nbsp;</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">No. STT *</label>
                                        <div class="col-lg-9">
                                            @if(!empty($paket))
                                            {!! Form::text('no_stt', null, ['class' => 'form-control', 'readonly' => true, 'style' => $bgGray]) !!}
                                            @else
                                            <input name="no_stt" type="text" class="form-control" required>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tipe Paket *</label>
                                        <div class="col-lg-9">
                                            <select id="inputState" name="tipe_paket" class="form-control" required>
                                                <option holder>Pilih Tipe Paket</option>
                                                @if(!empty($paket))
                                                <option value="Barang" {{ strtolower($paket[0]['tipe_paket']) == 'barang' ? 'selected' : '' }}>Barang</option>
                                                <option value="Dokumen" {{ strtolower($paket[0]['tipe_paket']) == 'dokumen' ? 'selected' : '' }}>Dokumen</option>
                                                <option value="Lain-lain" {{ strtolower($paket[0]['tipe_paket']) == 'lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                                                @else
                                                <option value="Barang">Barang</option>
                                                <option value="Dokumen">Dokumen</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Jenis Pelayanan *</label>
                                        <div class="col-lg-9">
                                            <select id="pelayanan" name="pelayanan" class="form-control" required>
                                                <option holder>Pilih Jenis Pelayanan</option>
                                                @if(!empty($paket))
                                                <option value="harga_normal" {{ $paket[0]['pelayanan'] == 'harga_normal' ? 'selected' : '' }}>Normal</option>
                                                <option value="harga_express" {{ $paket[0]['pelayanan'] == 'harga_express' ? 'selected' : '' }}>Express</option>
                                                <option value="harga_super_express" {{ $paket[0]['pelayanan'] == 'harga_super_express' ? 'selected' : '' }}>Super Express</option>
                                                @else
                                                <option value="harga_normal">Normal</option>
                                                <option value="harga_express">Express</option>
                                                <option value="harga_super_express">Super Express</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3 col-form-label">Agen Perwakilan *</label>
                                        <div class="col-lg-9">
                                            <select name="agen_perwakilan" class="form-control select2" required>
                                                <option holder>Pilih Agen Perwakilan</option>
                                                @foreach($agens as $agen)
                                                @if(!empty($paket))
                                                <option value="{{ $agen->nama_agen }}" {{ $paket[0]['agen_perwakilan'] == $agen->nama_agen ? 'selected' : '' }}>{{ $agen->nama_agen }}</option>
                                                @else
                                                <option value="{{ $agen->nama_agen }}">{{ $agen->nama_agen }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr style="width: 90vw;border: 5px double #333547;border-radius: 40%;">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3 col-form-label">Pengirim *</label>
                                        <div class="col-lg-9">
                                            <select name="kustomer" id="kustomer" class="form-control select2" required>
                                                <option holder>Pilih Pengirim</option>
                                                @foreach($customers as $customer)
                                                @if(!empty($paket))
                                                <option value="{{ $customer->nama_kustomer }}" {{ $paket[0]['kustomer'] == $customer->nama_kustomer ? 'selected' : '' }}>{{ $customer->nama_kustomer }}</option>
                                                @else
                                                <option value="{{ $customer->nama_kustomer }}">{{ $customer->nama_kustomer }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">No. SIK</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('no_sik', null, ['class' => 'form-control', 'id' => 'no_sik', 'value' => '']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Alamat Pengirim *</label>
                                        <div class="col-lg-9">
                                            {!! Form::textarea('alamat_pengirim', null, ['class' => 'form-control', 'style' => 'max-height:100px;', 'required' => true , 'id' => 'alamat_pengirim', 'value' => '']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Penerima *</label>
                                        <div class="col-lg-9">
                                            {!! Form::text('tujuan', null, ['class' => 'form-control', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Alamat Penerima *</label>
                                        <div class="col-lg-9">
                                            {!! Form::textarea('alamat_penerima', null, ['class' => 'form-control', 'style' => 'max-height:100px;', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    @if (empty($paket))
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3 col-form-label">Tujuan *</label>
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
                                    @endif
                                </div>
                                <hr style="width: 90vw;border: 5px double #333547;border-radius: 40%;">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Koli *</label>
                                        <div class="col-lg-9">
                                            @if (!empty($paket))
                                            {!! Form::text('koli', $fisik[0]->koli, ['class' => 'form-control', 'required' => true]) !!}
                                            @else
                                            {!! Form::text('koli', null, ['class' => 'form-control', 'required' => true]) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Volume Paket</label>
                                        <div class="col-lg-9" style="display:inline-flex;column-gap:15px;">
                                            @if (!empty($paket))
                                            <input id="panjang" name="panjang" type="number" value="{{ $fisik[0]->panjang }}" class="form-control col-lg-4" placeholder="cm">
                                            <input id="lebar" name="lebar" type="number" value="{{ $fisik[0]->lebar }}" class="form-control col-lg-3" placeholder="cm">
                                            <input id="tinggi" name="tinggi" type="number" value="{{ $fisik[0]->tinggi }}" class="form-control col-lg-4" placeholder="cm">
                                            @else
                                            <input id="panjang" name="panjang" type="number" class="form-control col-lg-4" placeholder="cm">
                                            <input id="lebar" name="lebar" type="number" class="form-control col-lg-3" placeholder="cm">
                                            <input id="tinggi" name="tinggi" type="number" class="form-control col-lg-4" placeholder="cm">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Berat (Kg) *</label>
                                        <div class="col-lg-9">
                                            @if (!empty($paket))
                                            <input id="berat" name="berat" type="number" value="{{ $fisik[0]->berat }}" class="form-control" placeholder="kg" readonly>
                                            @else
                                            <input id="berat" name="berat" type="number" class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="txtAddress2Billing" class="col-lg-3 col-form-label">Keterangan Paket *</label>
                                        <div class="col-lg-9">
                                            @if (!empty($paket))
                                            {!! Form::textarea('keterangan', $fisik[0]->keterangan, ['class' => 'form-control', 'style' => 'max-height:100px;', 'required' => true]) !!}
                                            @else
                                            {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'style' => 'max-height:100px;', 'required' => true]) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr style="width: 90vw;border: 5px double #333547;border-radius: 40%;">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Pembayaran *</label>
                                        <div class="col-lg-9">
                                            <select id="inputState" name="pembayaran" class="form-control" required>
                                                <option holder>Pilih Tipe Pembayaran</option>
                                                @if(!empty($paket))
                                                <option value="Tunai" {{ $cost[0]['pembayaran'] == 'Tunai' ? 'selected' : '' }}>Tunai/Cash</option>
                                                <option value="Kredit" {{ $cost[0]['pembayaran'] == 'Kredit' ? 'selected' : '' }}>Kredit</option>
                                                @else
                                                <option value="Tunai">Tunai/Cash</option>
                                                <option value="Kredit">Kredit</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tanggal Input *</label>
                                        <div class="col-lg-9">
                                            @if (!empty($paket))
                                            {!! Form::date('tanggal_input', $cost[0]->tanggal_input, ['class' => 'form-control', 'required' => true]) !!}
                                            @else
                                            {!! Form::date('tanggal_input', null, ['class' => 'form-control', 'required' => true]) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tanggal Pickup *</label>
                                        <div class="col-lg-9">
                                            @if (!empty($paket))
                                            {!! Form::date('tanggal_pickup', $cost[0]->tanggal_pickup, ['class' => 'form-control', 'required' => true]) !!}
                                            @else
                                            {!! Form::date('tanggal_pickup', null, ['class' => 'form-control', 'required' => true]) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Biaya Tambahan</label>
                                        <div class="col-lg-9">
                                            @if(!empty($paket))
                                            {!! Form::number('biaya_tambahan', $cost[0]->biaya_tambahan, ['class' => 'form-control']) !!}
                                            @else
                                            <input id="biaya_tambahan" name="biaya_tambahan" type="number" class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Diskon</label>
                                        <div class="col-lg-9">
                                            @if(!empty($paket))
                                            {!! Form::number('diskon', $cost[0]->diskon, ['class' => 'form-control']) !!}
                                            @else
                                            <input id="diskon" name="diskon" type="number" class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Total Harga *</label>
                                        <div class="col-lg-9">
                                            <input type="hidden" name="total_harga" value="">
                                            @if(!empty($paket))
                                            {!! Form::number('total_harga', $cost[0]->total_harga, ['class' => 'form-control', 'readonly' => true]) !!}
                                            @else
                                            <input id="total_harga" value="" name="total_harga" type="text" class="form-control" readonly>
                                            @endif
                                        </div>
                                    </div>
                                    <button style="float:right;" type="submit" class="btn btn-outline-primary btn-lg">SAVE</button>
                                    <a href="{{ url('daftar-paket') }}">
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