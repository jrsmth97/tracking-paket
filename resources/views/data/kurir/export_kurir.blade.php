@guest
Please Login First !
@else
@if(Auth::user()->type != 'admin')
Forbidden
@else
<div class="row justify-content-center">
    <div class="col-md-6 justify-content-center">
        <h2 style="font-weight:bolder;font-family:'Times New Roman', Times, serif">DAFTAR KURIR</h2>
    </div>
</div>
<h2></h2>
<table>
    <thead class="bg-dark text-light">
        <tr>
            <th></th>
            <th>No</th>
            <th>Nama</th>
            <th>Nama Agen</th>
            <th>Kendaraan</th>
        </tr>
    </thead>

    <tbody>
        @php
        $i = 1;
        @endphp
        @forelse($couriers as $courier)
        <tr>
            <td></td>
            <td>{{ $i }}</td>
            <td>{{$courier->nama_kurir}}</td>
            <td>{{$courier->nama_agen}}</td>
            <td>{{$courier->kendaraan}}</td>
        </tr>
        @php
        $i++;
        @endphp
        @empty
        <h4 class="card-title">No records found !</h4>
        @endforelse
    </tbody>
</table>
@endif
@endguest