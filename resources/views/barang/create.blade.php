@extends('layout.main')
<!-- START FORM -->
@section('content') 

<form action='{{ url('barang') }}' method='post' enctype="multipart/form-data">
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('barang') }}' class="btn btn-secondary"> kembali</a>

    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal_Upload</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='Tanggal_Upload' value="{{ Session::get('Tanggal_Upload') }}" id="Tanggal_Upload">
        </div>
    </div>
        
        <div class="mb-3 row">
            <label for="Harga_Awal" class="col-sm-2 col-form-label">Harga_awal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Harga_Awal' value="{{ Session::get('Harga_Awal') }}" id="Harga_Awal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='deskripsi' value="{{ Session::get('deskripsi') }}" id="deskripsi">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='foto'id="foto">
            </div>
        </div>
            


    </div>
    <div class="mb-3 row">
        <label for="Nama" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>

<!-- AKHIR FORM -->
@endsection