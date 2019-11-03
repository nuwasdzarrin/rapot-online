<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updatepassword(Request $request, $id)
    {
    	$data= User::findOrFail($id);

    	if($request->input('password')){
    		$data->password=bcrypt(($request->input('password')));

    	}
    	$data->update();
    	return redirect()->to('password');
    }

    public function home()
    {
    	$admin = Auth::user()->admin();
        return view('setting.password',compact('admin'));
    }

    public function update(Request $request,$id)
    {
        $admin = Auth::user()::find($id);
        Admin::find($id)->update($request->all());

        if($request->input('password')) {
            $admin->password = bcrypt(($request->input('password')));
        }
        return redirect('password')->with('sukses','Data berhasil di ubah');
    }
}
