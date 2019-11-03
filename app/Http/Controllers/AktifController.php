<?php

namespace App\Http\Controllers;
use App\Admin;
use Auth;
use App\aktif;
use Illuminate\Http\Request;

class AktifController extends Controller
{
		public function aktivasi(Request $request, $id)
		{

			$code = $request->code;
			$d = aktif::where('id', $id) -> first();
			$matikan = aktif::where('semester', 'off') -> first();

			if ($code == 0) {
				$d->status = 0;
				$matikan->status = 1;
			} else {
				$d->status = 1;
				$matikan->status = 0;
			}

			$cek = aktif::where('status', 1) -> count();
			if ($cek > 0) {
				if ($code == 0) {
					$d->update();
					$matikan->update();
					return redirect('/aktif') -> with(['sukses' => 'Berhasil Menonaktifkan Periode']);
				} else {
					$matikan->update();
					$d->update();
					return redirect('/aktif') -> with(['sukses' => 'Berhasil Menonaktifkan Periode']);
				}
				return redirect('/aktif') -> with(['error' => 'Gagal Mengaktifkan Periode, Matikan dahulu yang sedang aktif']);
			} else {
				$matikan->update();
				$d->update();
			}

			if ($code == 0) {
				return redirect('/aktif') -> with(['sukses' => 'Berhasil Menonaktifkan Periode']);
			} else {
				return redirect('/aktif') -> with(['sukses' => 'Berhasil Mengaktifkan Periode']);
			}

		}

		public function hapus($id)
		{
			$d = aktif::where('id', $id) -> first();
			$d->delete();
			return redirect('/aktif')-> with(['sukses' => 'Berhasil Menghapus Periode']);
		}

	public function update(Request $request, $id)
	{
		if ($request->semester == '') {
				return redirect('/aktif');
		}

		$d = aktif::where('id', $id) -> first();
		$d->semester = $request->semester;
		$d->periode = $request->periode;
		$d->update();
		return redirect('/aktif') -> with(['sukses' => 'Berhasil Mengupdate Periode']);
	}

	public function simpan(Request $request)
	{
		if ($request->semester == '') {
				return redirect('/aktif');
		}

		$d = new aktif();
		$d->semester = $request->semester;
		$d->periode = $request->period1 . '/' . $request->period2;
		$d->save();
		return redirect('/aktif') -> with(['sukses' => 'Berhasil Menyimpan Periode']);
	}

	public function index ()
	{
	$admin = Auth::user()->admin();
    return view('setting.aktif',compact('admin'));
	}
    public function aktif ()
    {
    	$tahun_angkatan = Input::get('ta');
        $semester = Input::get('smt');
         $siswa = \App\Siswa::with(['mapel' => function($c) use($tahun_angkatan, $semester) {
                                if($tahun_angkatan) {
                                    $c->where('tahun_angkatan', '=', $tahun_angkatan);
                                }

                                if($semester) {
                                    $c->where('semester', '=', $semester);
                                }
                            }])
                            ->where('id',$id)
                            ->get();
    }
}
