<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class petugas extends Authenticatable
{
  use HasApiTokens, Hasfactory, Notifiable;

  protected $guarded = ['id'];
  protected $table = 'tb_petugas_15459';

  public function getAutPassword()
  {
    return $this->password;
  }
  public function level()
  {
    return $this->hasOne(Level::class, 'id_15459', 'level_id');
  }
  public function lelang()
  {
    return $this->hasMany(Lelang::class);
  }
}
