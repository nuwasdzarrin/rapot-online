<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Siswa;

class SiswaImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
    	
        
       return new Siswa([
			'name'=>$row [1], 
 			'jenis_kelamin'=>$row[2],
 			'tempat_lahir'=>$row[3],
 			'tgl_lahir'=>gmdate('Y-m-d',$row[4]),
 			'nis'=>$row[5],
 			'agama'=>$row[6],
 			 'alamat'=>$row[7],
 			 'tahun_angkatan'=>$row[8],
 			 'username_siswa'=>$row[9],
 			 'password_siswa'=>$row[9+1],
 			 'kelas_id'=>$row[9+2],
 			
        	]);

       $user = new \App\User;
       $user->role = 'siswa';
       $user->name = $request->name;
       $user->nis= $request->nis;
       $user->password=bcrypt($request->password_siswa);
       $user->remember_token=str_random(60);
       $user->save();

       //insert ke table siswa
       $request->request->add(['user_id' => $user->id]);
       $siswa = \App\Siswa::create($request->all());

       return redirect ('/sukses')->with ('sukses','Data Berhasil dikirim');
      
        }
 			

    }

