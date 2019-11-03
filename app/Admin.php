<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';
    protected $fillable =['user_id','nama','alamat','jenis_kelamin','password','password'];

    public function user()
    {
    	//return $this->belongsTo('App\User');
    }
}
