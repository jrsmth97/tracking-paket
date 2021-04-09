@guest
Please Login First !
@else
@if(Auth::user()->type != 'admin')
Forbidden
@else
<div class="row justify-content-center">
    <div class="col-md-6 justify-content-center">
        <h2 style="font-weight:bolder;font-family:'Times New Roman', Times, serif">DAFTAR KUSTOMER</h2>
    </div>
</div>
<h2></h2>
<table>
    <thead class="bg-dark text-light">
        <tr>
            <th></th>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kustomer</th>
            <th>Wilayah</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <tbody>
        @php
        $i = 1;
        @endphp
        @forelse($customers as $customer)
        <tr>
            <td></td>
            <td>{{ $i }}</td>
            <td>{{$customer->kode}}</td>
            <td>{{$customer->nama_kustomer}}</td>
            <td>{{$customer->wilayah}}</td>
            <td>{{$customer->alamat}}</td>
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