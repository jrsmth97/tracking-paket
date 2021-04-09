@guest
Please Login First
@else
@if(Auth::user()->type != 'admin')
Forbidden
@else
<div class="row justify-content-center">
    <div class="col-md-6 justify-content-center">
        <h2 style="font-weight:bolder;font-family:'Times New Roman', Times, serif">KODE AGEN : {{ $hargaKustomer[0]->kode }}</h2>
    </div>
</div>
<h2></h2>
<table>
    <thead class="bg-dark text-light">
        <tr>
            <th></th>
            <th>No</th>
            <th>Tujuan</th>
            <th>Harga Normal</th>
            <th>EDD Normal</th>
            <th>Harga Express</th>
            <th>EDD Express</th>
            <th>Harga Super Express</th>
            <th>EDD Super Express</th>
        </tr>
    </thead>

    <tbody>
        @php
        $i = 1;
        @endphp
        @forelse($hargaKustomer as $hk)
        <tr>
            <td></td>
            <td>{{ $i }}</td>
            <td>{{$hk->tujuan}}</td>
            <td>{{$hk->harga_normal}}</td>
            <td>{{$hk->edd_normal}}</td>
            <td>{{$hk->harga_express}}</td>
            <td>{{$hk->edd_express}}</td>
            <td>{{$hk->harga_super_express}}</td>
            <td>{{$hk->edd_super_express}}</td>
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