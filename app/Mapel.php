<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
     protected $table = 'mapel';
     protected $fillable = ['kode','nama','semester'];

      public function siswa()
    {
    	return $this->belongsToMany(Siswa::class)->withPivot(['p_kd1','p_kd2','p_kd3','p_kd4','p_kd5','p_kd6','p_kd7','p_kd8','p_kd9','p_kd10','p_deskripsi','k_kd1','k_kd2','k_kd3','k_kd4','k_kd5','k_kd6','k_kd7','k_kd8','k_kd9','k_kd10','k_deskripsi']); 
    } 

    public function guru()
    {
    	return $this->belongsToMany(Guru::class)->withPivot(['deskripsi']); 
    }
}
