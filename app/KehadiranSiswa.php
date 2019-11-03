<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class KehadiranSiswa extends Model
{
    protected $table = 'kehadiran_siswa';
    protected $fillable = [
        'siswa_id',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'siswa_id');
    }

    public function getKeteranganAttribute($val)
    {
        return ucfirst($val);
    }

    public function getCreatedAtAttribute($val)
    {
        return Carbon::parse($val)->format('d/m/Y');
    }
}
