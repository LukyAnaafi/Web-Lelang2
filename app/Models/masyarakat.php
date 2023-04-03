<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class masyarakat extends Authenticatable
{

    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'tb_masyarakat_15459';
}
