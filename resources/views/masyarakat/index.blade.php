@extends('layout.main')
<!-- START DATA -->
@section('content')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
     <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('masyarakat/create') }}' class="btn btn-primary me-2">+ Tambah Data</a>
    </div>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('petugas') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <h1> DATA MASYARAKAT </h1>

    <table class="table table-striped">
        <thead>
            <tr>
               
                <th class="col-md-4">No </th>
                <th class="col-md-4">Nama </th>
                <th class="col-md-2">username</th>
                <th class="col-md-2">No_Telepon</th>
                
               
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
               
                <td>{{ $item->nama }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->No_Telepon }}</td>
                
               
              
                <td>
                    <a href='{{ url('masyarakat/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('masyarakat/'.$item->id) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection