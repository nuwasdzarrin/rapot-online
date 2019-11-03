<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel_Siswa;

use PDF;
class MapelSiswaController extends Controller
{
      public function index()
    {
    	$mapel_siswa = Mapel_Siswa::all();
    	return view('mapel_siswa',['mapel_siswa'=>$mapel_siswa]);
    }

    public function cetak_pdf()
    {
    	$mapel_siswa = Mapel_Siswa::all();

    	$pdf = PDF::loadview('mapel_siswa_pdf',['mapel_siswa'=>$mapel_siswa]);
    	return $pdf->download('laporan-mapel_siswa-pdf');
    }
}
