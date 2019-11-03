<?php

namespace App\Http\Controllers;

use App\aktif;
use App\Ekstra;
use Illuminate\Http\Request;

class EkstraController extends Controller
{
  public function save(Request $req)
  {
    // if (Ekstra::where('nama', strtolower($req->namaEkstra)) -> count() > 0) {
    //   return redirect('/ekstrakurikuler') -> with(['error' => "Nama Ekstra " . ucwords($req->namaEkstra) . " Sudah Ada!"]);
    // }
    //$s = Ekstra::where('id', $id) -> first();
    $periode = aktif::where('status', 1) -> first();
    $s = new Ekstra();
    $s->semester = $periode->semester;
    $s->tahun_angkatan = $periode->periode;
    $s->nama = $req->namaEkstra;
    $s->save();

    return redirect('/ekstrakurikuler') -> with(['sukses' => "Sukses menambah data"]);
  }

  public function update(Request $req, $id)
  {
    $periode = aktif::where('status', 1) -> first();
    $s = Ekstra::where('id', $id) -> first();
    $s->semester = $periode->semester;
    $s->tahun_angkatan = $periode->periode;
    $s->nama = $req->namaEkstra;
    $s->update();

    return redirect('/ekstrakurikuler') -> with(['sukses' => "Sukses memperbarui data"]);
  }

  public function hapus($id)
  {
    $s = Ekstra::where('id', $id) -> first();
    $s->delete();
    return redirect('/ekstrakurikuler') -> with(['sukses' => "Sukses menghapus data"]);
  }
}
