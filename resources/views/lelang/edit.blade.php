@extends('layout.main')
<!-- START FORM -->
@section('content') 

<form action='{{ url('lelang/'.$data->id) }}' method='post'>
@csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('lelang') }}' class="btn btn-secondary"><< kembali</a>
   
            {{ $data->id }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Nama_Barang" class="col-sm-2 col-form-label">Nama_Barang </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Nama_Barang ' value="{{ $data->Nama_Barang }}" id="Nama_Barang">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Tanggal_Lelang" class="col-sm-2 col-form-label">Tanggal_Lelang</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Tanggal_Lelang' value="{{ $data->Tanggal_Lelang}}" id="Tanggal_Lelang">
        </div>
        <div class="mb-3 row">
            <label for="harga_Akhir" class="col-sm-2 col-form-label">harga_Akhir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga_Akhir' value="{{ $data->harga_Akhir }}" id="harga_Akhir">
            </div>
            
    </div>
    <div class="mb-3 row">
        <label for="Nama_User" class="col-sm-2 col-form-label">Nama_User</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='Nama_User' value="{{ $data->Nama_User }}" id="Nama_User">
        </div>
        
</div>
<div class="mb-3 row">
    <label for="Status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name='Status' value="{{ $data->Status }}" id="Status">
    </div>
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