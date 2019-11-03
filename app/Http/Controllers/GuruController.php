<?php

namespace App\Http\Controllers;
use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->has('cari'))
       {
         $data_guru = \App\Guru::where('name','LIKE','%'.$request->cari.'%')->get();
       }else
       {
        $data_guru = \App\Guru::all();
       }
        
       return view('guru.index',['data_guru'=> $data_guru]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

       //insert ke table user
       $user = new \App\User;
       $user->role = 'guru';
       $user->name = $request->nama_guru;
       $user->email= $request->email_guru;
       $user->nip = $request->nip_guru;
       $user->password=bcrypt($request->password_guru);
       $user->remember_token=str_random(60);
       $user->save();

       //insert ke table Guru
       $request->request->add(['user_id' => $user->id]);
       $guru = \App\Guru::create($request->all());
        return redirect('/guru')->with('sukses','Data Berhasil di input');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru= \App\Guru::find($id);
        return view ('guru/edit',['guru' => $guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request->all());
        $guru= \App\Guru::find($id);
        $guru->update($request->all());
        if($request->hasFile('profile')){
            $request->file('profile')->move('images/',$request->file('profile')->getClientOriginalName());
            $guru->profile = $request->file('profile')->getClientOriginalName();
            $guru->save();
        }
       return redirect('/guru')-> with('sukses','data berhasil di update');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
    }

    public function delete($id)
    {
        $guru = \App\Guru::find($id);
        $guru -> delete($guru);
        return redirect('/guru')->with('sukses','Data berhasil dihapus');
    }
    public function profile($id)
    {
        $guru = \App\Guru::find($id);
        return view ('guru.profile',['guru' => $guru]);
    }
}
