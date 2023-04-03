@extends('layouts.home')

@section('content')
    <div class="page-inner mt--3">
        <form action="{{ route('history.store', ['idLelang' => $lelang->id]) }}" method="post">
            @csrf
            <input type="hidden" name="id_lelang" value="{{ $lelang->id }}">
            <input type="hidden" name="id_barang" value="{{ $lelang->id_barang }}">

            <div class="form-group">
                <label for="id_masyarakat_15471">User</label>
                <select class="form-control text-capitalize" id="id_masyarakat_15459" class="select-custom"
                    name="id_masyarakat" required>
                    @foreach ($masyarakat as $item)
                        @if ($item->id_15459 == old('id_masyarakat_15459'))
                            <option value="{{ $item->id }}" class="text-capitalize" selected>{{ $item->nama }}
                            </option>
                        @else
                            <option value="{{ $item->id }}" class="text-capitalize">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($masyarakat->isEmpty())
                    <div class="text-danger">
                        Data User Kosong
                    </div>
                @endif
                @error('id_masyarakat_15471')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="penawaran">Penawaran</label>
                <input type="number" class="form-control @error('penawaran') is-invalid @enderror"
                    id="penawaran" name="penawaran" placeholder="Masukan Harga Penawaran"
                    value="{{ old('penawaran') }}" required>
                @error('penawaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row justify-content-end">
                <a href="{{ route('lelang.index') }}" class="btn btn-sm btn-round btn-danger mx-1">Kembali</a>
                <button type="submit" class="btn btn-sm btn-round btn-success mx-1">Submit</button>
            </div>
        </form>
    </div>
@endsection