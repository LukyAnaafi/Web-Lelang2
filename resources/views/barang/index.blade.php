@extends('layout.main')
<!-- START DATA -->
@section('content')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
     <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('barang/create') }}' class="btn btn-primary me-2">+ Tambah Data</a>
    </div>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('barang') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <h1> DATA BARANG </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-2">foto</th>
                <th class="col-md-3">nama</th>
                <th class="col-md-4">Tanggal_Upload</th>
                <th class="col-md-2">Harga_Awal</th>
                <th class="col-md-2">deskripsi</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>

        @foreach ($data as $item)  
        <tbody>
            <tr>
                <td>
                    @if ($item->foto)
                    <img style='max-height:50px;max-width:50px' src='{{ asset('storage/' . $item->foto) }}'/>
                    @endif
                </td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->Tanggal_Upload }}</td>
                <td>{{ $item->Harga_Awal }}</td>
                <td>{{ $item->deskripsi }}</td>
               
                <td>
                    <a href='{{ url('barang/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('barang/'.$item->id) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            
        </tbody>
        @endforeach
    </table>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
    