<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
class DashboardController extends Controller
{
    public function index()
    {
    	$siswa = Siswa::all();
    	$siswa->map(function($s){
    		$s->rataRata = $s->rataRata();
    		return $s;

    	});
    	$siswa = $siswa->sortByDesc('rataRata');
    	
    	return view('dashboards.index',['siswa' => $siswa]);
    }
}
