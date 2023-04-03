<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded = ['id_15459'];
    protected $primaryKey = 'id_15459';
    protected $table = 'levels_15459';

    public function petugas()
    {
        return $this->hasMany(petugas::class);
    }
}
