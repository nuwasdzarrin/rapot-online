<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    	$data_admin = \App\Admin::all();
    	return view('operator.index',['data_admin'=> $data_admin]);
    }

      public function create(Request $request)
    {
        $this->validate($request,[
            'nama'=> 'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'username'=>'required',
            'password'=>'required',
        
        ]);

       //insert ke table user
       $user = new \App\User;
       $user->role = 'admin';
       $user->name = $request->nama;
       $user->username= $request->username;
       $user->password=bcrypt($request->password);
       $user->remember_token=str_random(60);
       $user->save();

       //insert ke table 
       $request->request->add(['user_id' => $user->id]);
       $data_admin = \App\Admin::create($request->all());
      
        return redirect('/operator')->with('sukses','Data Berhasil di input');
       
    }

     public function edit($id)
    {
        $data_admin= \App\Admin::find($id);

       return view ('operator/edit',['data_admin' => $data_admin]);
    }

    public function delete($id)
    {
        $data_admin = \App\Admin::find($id);
        $data_admin -> delete($data_admin);
        return redirect('/operator')->with('sukses','Data berhasil dihapus');
    }

       public function update(Request $request, $id)
    {
       // dd($request->all());
        $data_admin= \App\Admin::find($id);
        $data_admin->update($request->all());
        return redirect('/operator')-> with('sukses','data berhasil di update');
    }


}
