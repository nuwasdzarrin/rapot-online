<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = ['nama_guru', 'nip_guru', 'email_guru','password_guru','alamat','jenis_kelamin_guru','no_tlp_guru','jabatan_guru','status_aktif_guru','profile','user_id'];

     public function getProfile(){
    	if(!$this->profile){
    		return asset('images.profile.jpg');
    	}
    	return asset('images/'.$this->profile);
    }

    public function mapel()
    {
    	return $this->hashMany(Mapel::class);
    }
}
