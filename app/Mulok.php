<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mulok extends Model
{
    protected $table = 'mulok';
   protected $fillable = ['nama','semester'];

    public function siswa()
    {
      $periode  = aktif::where('status', 1) -> first();
    	return $this->belongsToMany(Siswa::class)
      ->where('aktif_id', $periode->id)
      ->withPivot(['p_kd1','p_kd2','p_kd3','p_kd4','p_deskripsi','k_kd1','k_kd2','k_kd3','k_kd4','k_deskripsi', 'aktif_id'])
      ;
    }
}
