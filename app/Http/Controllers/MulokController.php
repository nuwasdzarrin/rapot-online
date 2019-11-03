<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aktif;
class MulokController extends Controller
{
     public function addmulok(request $request,$idsiswa)
    {
      // Mengecek Periode
      $periode = aktif::where('status', 1) -> first();
      if ($periode->periode== 'off') {
        // Jika Periode kosong / tidak ada yang aktif
        return redirect('siswa/'.$idsiswa. '/profile')->with('error','Gagal menambah nilai harap aktifkan periode terlebih dahulu');
      }

     $siswa = \App\Siswa::find($idsiswa);
     if($siswa->mulok()->where('mulok_id',$request->mulok)->exists())
     {
    return redirect('siswa/'.$idsiswa. '/profile')->with('error','Data matapelajaran sudah ada.');
    }
        $siswa->mulok()->attach($request->mulok,['p_kd1'=> $request->p_kd1, 'aktif_id' => $periode->id , 'p_kd2'=>$request->p_kd2,'p_kd3'=>$request->p_kd3,'p_kd4'=>$request->p_kd4,'p_deskripsi'=>$request->p_deskripsi,'k_kd1'=>$request->k_kd1,'k_kd2'=>$request->k_kd2,'k_kd3'=>$request->k_kd3,'k_kd4'=>$request->k_kd4,'k_deskripsi'=>$request->k_deskripsi]);


        return redirect('siswa/'.$idsiswa. '/profile')->with('sukses','Data berhasil dimasukkan');

    }

     public function deletemulok($idsiswa,$idmulok)
    {
         $siswa = \App\Siswa::find($idsiswa);
         $siswa->mulok()->detach($idmulok);
         return redirect()->back()->with('sukses','Data Nilai Berhasil dihapus');
    }

    
}
