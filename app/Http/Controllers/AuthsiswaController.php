<?php

namespace App\Http\Controllers;
use Authsiswa;
use Auth;
use Illuminate\Http\Request;

class AuthsiswaController extends Controller
{
     public function loginsiswa()
    {
    	return view('auths.loginsiswa');
    }
    public function postloginsiswa(Request $request)
    {
    	if(Auth::attempt($request->only('nis','password'))){
    		return redirect('/dashboard');
    	}
       
    	return redirect('/loginsiswa');
        
    }
    public function logoutsiswa()
    {
    	Auth::logout();
    	return redirect('/loginsiswa');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'=>'required|max:255',
            'username'=>'required|unique:users',
            'nis'=>'required|unique:users',
            'email'=>'required|max:255|unique:users',
            'password'=>'required|min:10|confirmed',
        ]);
    }
}
