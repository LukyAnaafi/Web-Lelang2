@extends('layout.main')
<!-- START FORM -->
@section('content') 

<form action='{{ url('petugas') }}' method='post'  >
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('petugas') }}' class="btn btn-secondary"> kembali</a>
   
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='username' value="{{ Session::get('username') }}" id="username">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='password' value="{{ Session::get('password') }}" id="password">
        </div>
    </div>
        
        <div class="mb-3 row">
            <label for="Level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select name="level_id" class="form-control">
                    @foreach ($levels as $level)
                        <option value="{{ $level->id_15459 }}">{{ $level->nama_15459 }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" name='Level' value="{{ Session::get('Level') }}" id="Level"> --}}
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