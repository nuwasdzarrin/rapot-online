<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MulokSiswa extends Model
{
     protected $table = 'mulok_siswa';
   protected $fillable = ['muatanlokal','p_kd1','p_kd2','p_kd3','p_kd4','p_deskripsi','k_kd1','k_kd2','k_kd3','k_kd4','k_deskripsi'];

}
