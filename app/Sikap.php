<?php

namespace App;
use App\aktif;
use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
     protected $table = 'sikap';
     protected $fillable = ['nilai'];

      public function siswa()
    {
      $periode  = aktif::where('status', 1) -> first();
    	return $this->belongsToMany(Siswa::class)
      ->where('aktif_id', $periode->id)
      ->withPivot(['deskripsi', 'aktif_id'])
      ;
    }

}
