<?php

namespace App\Http\Controllers;
use App\aktif;
use Illuminate\Http\Request;

class SikapController extends Controller
{
     public function addsikap(request $request,$idsiswa)
    {
      // Mengecek Periode
      $periode = aktif::where('status', 1) -> first();
      if ($periode->periode== 'off') {
        // Jika Periode kosong / tidak ada yang aktif
        return redirect('siswa/'.$idsiswa. '/profile')->with('error','Gagal menambah nilai harap aktifkan periode terlebih dahulu');
      }

     $siswa = \App\Siswa::find($idsiswa);
     if($siswa->sikap()->where('sikap_id',$request->sikap)->exists())
     {
    return redirect('siswa/'.$idsiswa. '/profile')->with('error','Data matapelajaran sudah ada.');
    }
        $siswa->sikap()->attach($request->sikap,['deskripsi'=> $request->deskripsi, 'aktif_id' => $periode->id]);


        return redirect('siswa/'.$idsiswa. '/profile')->with('sukses','Data berhasil dimasukkan');

    }

     public function deletesikap($idsiswa,$idsikap)
    {
         $siswa = \App\Siswa::find($idsiswa);
         $siswa->sikap()->detach($idsikap);
         return redirect()->back()->with('sukses','Data Nilai Berhasil dihapus');
    }

}
