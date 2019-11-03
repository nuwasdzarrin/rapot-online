<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthguruController extends Controller
{
     public function loginguru()
    {
    	return view('auths.loginguru');
    }
    public function postloginguru(Request $request)
    {
    	if(Auth::attempt($request->only('nip','password'))){
    		return redirect('/dashboard');
    	}
       
    	return redirect('/loginguru');
        
    }
    public function logoutguru()
    {
    	Auth::logout();
    	return redirect('/loginguru');
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
