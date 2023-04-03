@extends('layout.main')

@section('content')
    <div class="page-inner mt--3">
        <div class="row justify-content-end">
            <a href="#" class="btn btn-success btn-round mb-3">
                <i class="fa fa-plus"></i>
                Tambah History
            </a>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table id="datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">
                <thead class="table-primary">
                    <tr>
                        <th>Nama User</th>
                        <th>No telepon</th>
                        <th>nama barang</th>
                        <th>Penawaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $item)
                        <tr>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->user->No_Telepon }}</td>
                            <td>{{ $item->barang->nama }}</td>
                            <td>{{ $item->penawaran_harga }}</td>
                            <td>
                                @if ($item->id == $idPemenang)
                                    <div class="form-button-action">
                                        <a href="#" class="btn btn-link" title="Pemenang">
                                            <img src="https://raw.githubusercontent.com/Alfian57/My-Auction/main/public/assets/img/pemenang.png" alt="Pemenang Icon" class="icon">
                                        </a>
                                    </div>
                                @else
                                    <div class="form-button-action">
                                        @if ($lelang->Status == 'dibuka')
                                            <a href="/winner/{{ $lelang->id }}/history/{{ $item->id }}" class="btn btn-link btn-pemenang"
                                                title="Pilih Pemenang">
                                                <img src="https://raw.githubusercontent.com/Alfian57/My-Auction/main/public/assets/img/pilih.png" alt="Pilih Icon" class="icon">
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-link" title="Pemenang">
                                                <img src="https://raw.githubusercontent.com/Alfian57/My-Auction/main/public/assets/img/pilih.png" alt="Pilih Icon" class="icon">
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection