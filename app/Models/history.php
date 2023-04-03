<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id', 'id_barang');
    }

    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'id', 'id_user');
    }

    public function lelang()
    {
        return $this->hasOne(Lelang::class, 'id', 'id_lelang_15459');
    }
}
