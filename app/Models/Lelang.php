<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'tb_lelang_15459';
    protected $primaryKey =  'id';

    public function historyLelang()
    {
        return $this->hasMany(history::class, 'id', 'id_lelang');
    }

    public function barang()
    {
        return $this->hasOne(barang::class, 'id', 'id_barang');
    }
    public function user()
    {
        return $this->hasOne(masyarakat::class, 'id', 'id_user');
    }

    public function getMinBid()
    {
        $history = history::where('id', $this->id)->orderBy('penawaran_harga', 'desc')->first();

        if ($history == null) {
            $lelang = Lelang::where('id', $this->id)->firstOrFail();
            $minBid = $lelang->barang->Harga_Akhir;
        } else {
            $minBid = $history->penawaran_harga;
        }

        return $minBid;
    }
}
