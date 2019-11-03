<?php

namespace App\Http\Controllers;

use App\SaranSiswa;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
    	$siswa = \App\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk,[$request->nilai => $request->value]);
        
        // nilai p
        // $nilai_p1 = $siswa->mapel->nilai_p1;
    	
    }

    public function editSaran(Request $request, $id)
    {
        $saran = SaranSiswa::find($request->pk);
        $saran->deskripsi = $request->value;
        $saran->save();

        // SaranSiswa::where('id', '=', 1)->update([
        //     'deskripsi' => 'dasdas'
        // ]);
    }

}
