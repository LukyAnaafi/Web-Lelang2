@extends('layout.main')
<!-- START FORM -->
@section('content') 

<form action='{{ url('lelang') }}' method='post'  enctype="multipart/form-data">
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('lelang') }}' class="btn btn-secondary"> kembali</a>
    
    <div class="mb-3 row">
        <label for="id_barang" class="col-sm-2 col-form-label">Nama_Barang</label>
        <div class="col-sm-10">
            <select name="id_barang" id="id_barang" class="form-control" required>
                @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection