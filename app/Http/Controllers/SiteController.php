<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function home()
   {
   	return view('sites.home');
   }

public function visi()
   {
   	return view('sites.visi');
   }
  public function register ()
  {
	return view('sites.register');
  }
  public function sukses ()
  {
  return view('sites.sukses');
  }
  public function postregister(Request $request)
  {
    //input pendaftaran sebagai user
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
