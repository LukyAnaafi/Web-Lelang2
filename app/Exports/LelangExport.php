<?php

namespace App\Exports;

use App\Models\Lelang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LelangExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $lelang = Lelang::leftJoin('tb_masyarakat_15459', 'tb_lelang_15459.id_user', 'tb_masyarakat_15459.id')
            ->join('tb_barang_15459', 'tb_lelang_15459.id_barang', 'tb_barang_15459.id')
            ->select('tb_barang_15459.nama as nama_barang', 'tb_lelang_15459.Tanggal_Lelang', 'tb_lelang_15459.Harga_Akhir', 'tb_masyarakat_15459.nama as nama_user')
            ->get();

        foreach ($lelang as $item) {
            if ($item->Harga_Akhir == null) {
                $item->Harga_Akhir = "Harga Belum Ditentukan";
            }
            if ($item->nama_user == null) {
                $item->nama_user = "Pemenang Belum Ditentukan";
            }
        }

        return $lelang;
    }

    public function headings(): array
    {
        return ['Nama Barang', 'Tanggal', 'Harga Akhir', 'Nama user'];
    }
}
