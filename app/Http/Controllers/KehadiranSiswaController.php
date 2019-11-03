<?php

namespace App\Http\Controllers;

use App\KehadiranSiswa;
use App\Siswa;
use Illuminate\Http\Request;

class KehadiranSiswaController extends Controller
{
    public function index()
    {
        $kehadiran = KehadiranSiswa::orderBy('created_at', 'desc')->paginate(10);
        $siswa = Siswa::orderBy('name')->get();

        return view('kehadiran.index', compact('kehadiran', 'siswa'));
    }

    public function store(Request $request)
    {
        KehadiranSiswa::create([
            'siswa_id' => $request->siswa_id,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/kehadiran')->with('sukses', 'Data berhasil disimpan!');
    }

    public function destroy(KehadiranSiswa $id)
    {
        $id->delete();

        return redirect('/kehadiran')->with('sukses', 'Data berhasil dihapus!');
    }
}
