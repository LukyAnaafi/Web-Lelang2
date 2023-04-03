@extends('layout.main')
<!-- START FORM -->
@section('content') 

<form action='{{ url('masyarakat/'.$data->id) }}' method='post'>
@csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('masyarakat') }}' class="btn btn-secondary"> kembali</a>
   
           
      
    
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='username' value="{{ $data->username}}" id="username">
        </div>
    </div>
        <div class="mb-3 row">
            <label for="No_Telepon" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='No_Telepon' value="{{ $data->No_Telepon }}" id="No_Telepon">
            </div>
            
    </div>

    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection