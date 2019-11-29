<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\mapelSiswa;
class RangkingController extends Controller
{
    public function index()
    {
		$siswa = Siswa::all();
    	$siswa->map(function($s){
    		$s->rataRata = $s->rataRata();
    		return $s;

		});
		$siswa = $siswa->sortByDesc('rataRata');

    	return view('rangking.index', compact('siswa'));
	}

	public function show($kelas)
	{
		$siswa = Siswa::where('kelas_id', '=', $kelas)->get();
    	$siswa->map(function($s){
    		$s->rataRata = $s->rataRata();
    		return $s;

		});
		$siswa = $siswa->sortByDesc('rataRata');

		return view('rangking.show',['siswa' => $siswa]);
	}
}
