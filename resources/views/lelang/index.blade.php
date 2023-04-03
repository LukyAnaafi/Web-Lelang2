@extends('layout.main')
<!-- START DATA -->
@section('content')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
     <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('/lelang/create') }}' class="btn btn-primary me-2">+ Tambah Data</a>
        <form action="/lelang/export" method="post" class="d-inline-block">
            @csrf
            <button type='submit' class="btn btn-primary me-2">Download Laporan</button>
        </form>
    </div>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('lelang') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <h1> DATA LELANG </h1>

    <table class="table table-striped">
        <thead>
            <tr>
               
                <th class="col-md-4">Nama_Barang </th>
                <th class="col-md-4">Tanggal_Lelang </th>
                <th class="col-md-2">Harga_Akhir</th>
                <th class="col-md-2">Nama_User</th>
                <th class="col-md-2">Status</th>
                
               
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                
               
                <td>{{ $item->barang->nama}}</td>
                <td>{{ $item->Tanggal_Lelang  }}</td>

                @if ($item->Harga_Akhir)
                    <td>{{ $item->Harga_Akhir }}</td>
                @else
                    <td class="text-danger">Kosong</td>
                @endif
                

                @if ($item->user)
                    <td>{{ $item->user->nama}}</td>
                @else
                    <td class="text-danger">Kosong</td>
                @endif
                
                <td>{{ $item->Status }}</td>
                
               
              
                <td>
                    <a href='{{ url('lelang/'.$item->id) }}' class="btn btn-primary btn-sm">History</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection