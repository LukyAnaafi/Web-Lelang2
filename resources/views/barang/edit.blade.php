@extends('layout.main')
<!-- START FORM -->
@section('content') 

<form action='{{ url('barang/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('petugas') }}' class="btn btn-secondary">kembali</a>
    <div class="mb-3 row">
        <label for="No" class="col-sm-2 col-form-label">No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='No' value="{{ $data->No }}" id="No" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Tanggal_update" class="col-sm-2 col-form-label">Tanggal_update </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Tanggal_update' value="{{ $data->Tanggal_update }}" id="Tanggal_update">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Harga_Awal" class="col-sm-2 col-form-label">Harga_Awal </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Harga_Awal' value="{{ $data->Harga_Awal }}" id="Harga_Awal">
        </div>
    
    </div>
    <div class="mb-3 row">
        <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='deskripsi' value="{{ $data->deskripsi }}" id="deskripsi">
        </div>
    
    </div>
    

    
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</div>

</form>
<!-- AKHIR FORM -->
@endsection