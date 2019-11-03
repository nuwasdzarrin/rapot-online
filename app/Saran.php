<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'saran';
    protected $fillable = [
        'semester','periode'
    ];

    public function saranSiswa()
    {
        return $this->hasMany('App\SaranSiswa');
    }
}
