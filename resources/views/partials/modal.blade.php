<!-- Modal Agen -->
<div class="modal fade" id="agenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import agen from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_agen.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_agen') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_agen" id="file1" class="file1" required>
                        <div class="d-flex">
                            <input type="text" name="import_agen" id="file-name1" class="file-name1" readonly="readonly">
                            <input type="button" name="import_agen" class="btn-file1" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kustomer -->
<div class="modal fade" id="kustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import customers from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_kustomer.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_kustomer') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_kustomer" id="file2" class="file2" required>
                        <div class="d-flex">
                            <input type="text" name="import_kustomer" id="file-name2" class="file-name2" readonly="readonly">
                            <input type="button" name="import_kustomer" class="btn-file2" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kurir -->
<div class="modal fade" id="kurirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import couriers from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_kurir.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_kurir') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_kurir" id="file3" class="file3" required>
                        <div class="d-flex">
                            <input type="text" name="import_kurir" id="file-name3" class="file-name3" readonly="readonly">
                            <input type="button" name="import_kurir" class="btn-file3" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@php
$uri = \Request::getRequestUri();
$exp = explode('/', $uri);
if(count($exp) > 2) {
$kode = $exp[2];
} else {
$kode = null;
}
@endphp
<!-- Modal Harga Agen -->
<div class="modal fade" id="hargaAgenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import agen prices from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_hargaagen.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_harga_agen/' . $kode) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_harga_agen" id="file4" class="file4" required>
                        <div class="d-flex">
                            <input type="text" name="import_harga_agen" id="file-name4" class="file-name4" readonly="readonly">
                            <input type="button" name="import_harga_agen" class="btn-file4" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Harga Kustomer -->
<div class="modal fade" id="hargaKustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import customer prices from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_hargakustomer.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_harga_kustomer/' . $kode) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_harga_kustomer" id="file5" class="file5" required>
                        <div class="d-flex">
                            <input type="text" name="import_harga_kustomer" id="file-name5" class="file-name5" readonly="readonly">
                            <input type="button" name="import_harga_kustomer" class="btn-file5" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Harga General -->
<div class="modal fade" id="hargaGeneralModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import general prices from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_hargageneral.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_harga_general') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_harga_general" id="file6" class="file6" required>
                        <div class="d-flex">
                            <input type="text" name="import_harga_general" id="file-name6" class="file-name6" readonly="readonly">
                            <input type="button" name="import_harga_general" class="btn-file6" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Daftar Paket -->
<div class="modal fade" id="paketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import packages from excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h3><a href="{{ asset('storage/import_format/') }}/format_impor_paket.xlsx">Download</a> contoh format excel untuk import</h3><br>
                        <p class="text-danger">Perhatikan, format dan nama header tiap kolom harus sama persis dengan yang ada di dalam contoh</p>
                    </div>
                </div>
            </div>
            <form action="{{ url('import_paket') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-center wrapper2 align-items-center">
                        <input type="file" name="import_paket" id="file7" class="file7" required>
                        <div class="d-flex">
                            <input type="text" name="import_paket" id="file-name7" class="file-name7" readonly="readonly">
                            <input type="button" name="import_paket" class="btn-file7" value="select">
                        </div>
                    </div>
                    <span style="margin-left:5.5%;">File Supported : .xls .xlsx .csv</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>