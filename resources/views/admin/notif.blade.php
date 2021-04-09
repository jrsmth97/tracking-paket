@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title-box">
                    <h2>Riwayat Notifikasi</h2>
                    <hr class="mb-3" style="width:79vw;">
                    @include('partials.flash', ['$errors' => $errors])
                </div>
            </div>
            <div class="col-md-6 mb-4">
                {!! Form::open(['url' => 'clean-notif/', 'class' => 'delete']) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                <button type="submit" class="btn btn-danger float-right" alt="hapus" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i> &nbsp;Hapus Semua Notifikasi</button>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @forelse($notifications as $nt)
            <div class="col-md-12 d-inline">
                <div class="container">
                    <a href="{{ $nt->action != null ? url(htmlspecialchars($nt->action)) : '#' }}">
                        <button type="button" class="alert alert-primary btn-notif"><b class="f-700">{{ $nt->name == Auth::user()->nama ? 'Anda' : $nt->name }}</b> {{ $nt->messages }}
                            <b>
                                <p class="float-right f-700">{{ date('d M Y H:i:s', strtotime($nt->created_at)) }}</p>
                            </b>
                        </button>
                    </a>
                </div>
            </div>
            @empty
            No Notifications Found !
            @endforelse
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection