@guest
Please Login First !
@else
@if(Auth::user()->type != 'admin')
Forbidden
@else
<div class="row justify-content-center">
    <div class="col-md-6 justify-content-center">
        <h2 style="font-weight:bolder;font-family:'Times New Roman', Times, serif">DAFTAR PAKET</h2>
    </div>
</div>
<h2></h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No. STT</th>
            <th>Kustomer</th>
            <th>Agen Perwakilan</th>
            <th>Tujuan</th>
            <th>Tipe Paket</th>
            <th>Tanggal</th>
            <th>Tarif</th>
            <th>Berat</th>
            <th>Koli</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach($pakets as $paket)
        @foreach($paket->cost as $pc)
        @foreach($paket->detail as $pd)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $paket->no_stt }}</td>
            <td>{{ $paket->kustomer }}</td>
            <td>{{ $paket->agen_perwakilan }}</td>
            <td>{{ $paket->tujuan }}</td>
            <td>
                <ul style="list-style-type: none;margin-left:-30px;">
                    <li>TIPE: {{ $paket->tipe_paket }}</li>
                    <li class="d-paket">PAYMENT: {{ $pc->pembayaran }}</li>
                    <li>SERVICE: {{ strtoupper(str_replace('harga_', '', $paket->pelayanan)) }}</li>
                </ul>
            </td>
            <td class="d-paket">{{ $pc->tanggal_input }}</td>
            <td class="d-paket">Rp. {{ $pc->total_harga }}</td>
            <td class="d-paket">{{ $pd->berat }} Kg</td>
            <td class="d-paket">{{ $pd->koli }} Koli</td>
        </tr>
        @php
        $i++;
        @endphp
        @endforeach
        @endforeach
        @endforeach
    </tbody>
</table>
@endif
@endguest