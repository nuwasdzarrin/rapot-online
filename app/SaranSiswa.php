<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaranSiswa extends Model
{
    protected $table = 'saran_siswa';
    public $timestamps = false;
    protected $fillable = [
        'siswa_id',
        'saran_id',
        'deskripsi'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'siswa_id');
    }

    public function saran()
    {
        return $this->belongsTo('App\Saran', 'saran_id');
    }
}
