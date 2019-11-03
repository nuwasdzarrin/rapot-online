<?php

namespace App\Http\Controllers;
use App\MulokSiswa;
use App\Siswa;
use Illuminate\Http\Request;

class MulokSiswaController extends Controller
{
   public function index()
    {
        $mulok = MulokSiswa::orderBy('created_at', 'desc')->paginate(10);
        $siswa = Siswa::orderBy('name')->get();

        return view('kehadiran.index', compact('mulok', 'siswa'));
    }

    public function store(Request $request)
    {
        MulokSiswa::create([
            'siswa_id' => $request->siswa_id,
            'muatanlokal' => $request->muatanlokal,
            'p_kd1'=>$request->p_kd1,
            'p_kd2'=>$request->p_kd2,
            'p_kd3'=>$request->p_kd3,
            'p_kd4'=>$request->p_kd4,
            'p_deskripsi'=>$request->p_deskripsi,
            'k_kd1'=>$request->k_kd1,
            'k_kd2'=>$request->k_kd2,
            'k_kd3'=>$request->k_kd3,
            'k_kd4'=>$request->k_kd4,
            'k_deskripsi'=>$request->k_deskripsi
        ]);

        return redirect('/mulok')->with('sukses', 'Data berhasil disimpan!');
    }

    public function destroy(MulokSiswa $id)
    {
        $id->delete();

        return redirect('/mulok')->with('sukses', 'Data berhasil dihapus!');
    }
}
