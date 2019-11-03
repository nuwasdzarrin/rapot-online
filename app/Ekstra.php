<?php

namespace App;

use App\aktif;
use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
   protected $table = 'ekstra';
   protected $fillable = ['nama','semester'];

    public function siswa()
    {
      $periode  = aktif::where('status', 1) -> first();
    	return $this->belongsToMany(Siswa::class)
      ->where('aktif_id', $periode->id)
      ->withPivot(['deskripsi', 'aktif_id'])
      ;
    }
}
