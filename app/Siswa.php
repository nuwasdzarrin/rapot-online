<?php

namespace App;
use App\aktif;
use Auth;
use App\mapelSiswa;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['name', 'jenis_kelamin', 'tempat_lahir','tgl_lahir','nis','agama','alamat','tahun_angkatan','username_siswa','password_siswa','profile','kelas_id','user_id'];

    public function getProfile(){
    	if(!$this->profile){
    		return asset('images.profile.jpg');
    	}
    	return asset('images/'.$this->profile);
    }
    public function mapel()
    {   // Mengecek Periode yang aktif
        $periode  = aktif::where('status', 1) -> first();

        return $this->belongsToMany(Mapel::class)
            ->withPivot(['p_kd1','p_kd2','p_kd3','p_kd4','p_kd5','p_kd6','p_kd7','p_kd8','p_kd9','p_kd10','p_deskripsi','k_kd1','k_kd2','k_kd3','k_kd4','k_kd5','k_kd6','k_kd7','k_kd8','k_kd9','k_kd10','k_deskripsi'])
            ->where('aktif_id', $periode->id)
            ->withTimeStamps();
    }

    public function saranSiswa()
    {
        return $this->hasMany('App\SaranSiswa');
    }

    public function ekstra()
    {
        $periode  = aktif::where('status', 1) -> first();
        return $this->belongsToMany(Ekstra::class)
        ->where('aktif_id', $periode->id)
        ->withPivot(['deskripsi', 'aktif_id'])
        ->withTimeStamps();
    }

    public function mulok()
    {
        $periode  = aktif::where('status', 1) -> first();
        return $this->belongsToMany(Mulok::class)
        ->where('aktif_id', $periode->id)
        ->withPivot(['p_kd1','p_kd2','p_kd3','p_kd4','p_deskripsi','k_kd1','k_kd2','k_kd3','k_kd4','k_deskripsi', 'aktif_id'])
        ->withTimeStamps();
    }
 public function sikap()
    {
        $periode  = aktif::where('status', 1) -> first();
        return $this->belongsToMany(Sikap::class)
        ->where('aktif_id', $periode->id)
        ->withPivot(['deskripsi', 'aktif_id'])
        ->withTimeStamps();
    }
    public function kehadiranSiswa()
    {
        return $this->hasMany('App\KehadiranSiswa');
    }

    public function rataRata()
    {
     //ambil nilai
        $nap = [];
        $nak = [];
        foreach ($this->mapel as $mapel ) {
            $nap[] = $mapel->pivot->p_kd1;
            $nap[] = $mapel->pivot->p_kd2;
            $nap[] = $mapel->pivot->p_kd3;
            $nap[] = $mapel->pivot->p_kd4;
            $nap[] = $mapel->pivot->p_kd5;
            $nap[] = $mapel->pivot->p_kd6;
            $nap[] = $mapel->pivot->p_kd7;
            $nap[] = $mapel->pivot->p_kd8;
            $nap[] = $mapel->pivot->p_kd9;
            $nap[] = $mapel->pivot->p_kd10;

            $nap[] = $mapel->pivot->k_kd1;
            $nap[] = $mapel->pivot->k_kd2;
            $nap[] = $mapel->pivot->k_kd3;
            $nap[] = $mapel->pivot->k_kd4;
            $nap[] = $mapel->pivot->k_kd5;
            $nap[] = $mapel->pivot->k_kd6;
            $nap[] = $mapel->pivot->k_kd7;
            $nap[] = $mapel->pivot->k_kd8;
            $nap[] = $mapel->pivot->k_kd9;
            $nap[] = $mapel->pivot->k_kd10;

        }

        return array_sum($nap) + array_sum($nak);
    }

}
