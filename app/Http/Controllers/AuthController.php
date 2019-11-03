<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auths.login');
    }
    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('username','password'))){
    		return redirect('/dashboard');
    	}
       
    	return redirect('/login');
        
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
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
