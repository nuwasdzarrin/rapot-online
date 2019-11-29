<?php

namespace App\Http\Controllers;
use App\Siswa;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use App\KehadiranSiswa;
use App\SaranSiswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Imports\SiswaImport;
use Session;
use PDF;
use Carbon;
use App\MulokSiswa;
use App\aktif;
use Auth;
use App\mapelSiswa;


class SiswaController extends Controller
{
    public function addsaransiswa(Request $minta, $id)
    {
      $periode  = aktif::where('status', 1) -> first();
      $a = new SaranSiswa();
      $a->siswa_id = $id;
      $a->aktif_id = $a->saran_id = $periode->id;
      $a->deskripsi = $minta->deskripsiSaran;
      $a->save();

      return redirect('/siswa/' . $id . '/profile' )->with('sukses','Saran siswa berhasil di input, silahkan periksa');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->has('cari'))
       {
         $data_siswa = \App\Siswa::where('name','LIKE','%'.$request->cari.'%')->get();
       }else
       {
        $data_siswa = \App\Siswa::all();
       }

       return view('siswa.index',['data_siswa'=> $data_siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $this->validate($request,[
            'name'=> 'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'nis'=>'required',
            'agama'=>'required',
            'alamat'=>'required',
            'tahun_angkatan'=>'required',
            'password_siswa'=>'required',
            'profile' => 'mimes:jpg,png',
        ]);

       //insert ke table user
       $user = new \App\User;
       $user->role = 'siswa';
       $user->name = $request->name;
       $user->nis= $request->nis;
       $user->password=bcrypt($request->password_siswa);
       $user->remember_token=str_random(60);
       $user->save();

       //insert ke table siswa
       $request->request->add(['user_id' => $user->id]);
       $siswa = \App\Siswa::create($request->all());
        if($request->hasFile('profile')){
            $request->file('profile')->move('images/',$request->file('profile')->getClientOriginalName());
            $siswa->profile = $request->file('profile')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil di input');

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa= \App\Siswa::find($id);
        return view ('siswa/edit',['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request->all());
        $siswa= \App\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('profile')){
            $request->file('profile')->move('images/',$request->file('profile')->getClientOriginalName());
            $siswa->profile = $request->file('profile')->getClientOriginalName();
            $siswa->save();
        }
       return redirect('/siswa')-> with('sukses','data berhasil di update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa -> delete($siswa);
         return redirect('siswa/')->with('sukses','Data berhasil dihapus');

    }
    public function profile($id)
    {

        // get all tahun angkatan in table mapel with group by
        $tahun_angkatan = \App\Mapel::select('tahun_angkatan')->groupBy('tahun_angkatan')->get()->toArray();
        $periode  = aktif::where('status', 1) -> first();

        // get all semester in mapel
        $semester = \App\Mapel::select('semester')->groupBy('semester')->get()->toArray();

        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();
        $muatanlokal=\App\Mulok::all();
        $nilaisikap=\App\Sikap::all();
        $ekstrakulikuler = \App\Ekstra::all();

        // get all saran
        $saran = SaranSiswa::where('siswa_id', '=', $id) ->where('aktif_id', $periode->id) ->get();

        if($saran->count() == 0) {
            SaranSiswa::create([
                'siswa_id' => $id,
                'saran_id' => 1,
                'deskripsi' => ''
            ]);

            SaranSiswa::create([
                'siswa_id' => $id,
                'saran_id' => 2,
                'deskripsi' => ''
            ]);
        }

        return view ('siswa.profile',[
            'tahun_angkatan' => $tahun_angkatan, 
            'semester' => $semester, 
            'siswa' => $siswa,
            'matapelajaran' => $matapelajaran,
            'ekstrakulikuler'=>$ekstrakulikuler, 
            'saran' => $saran,
            'muatanlokal' => $muatanlokal,
            'nilaisikap' => $nilaisikap
        ]);
    }
    public function addnilai(request $request,$idsiswa)
    {
      // Mengecek Periode
      $periode = aktif::where('status', 1) -> first();
      if ($periode->periode== 'off') {
        // Jika Periode kosong / tidak ada yang aktif
        return redirect('siswa/'.$idsiswa. '/profile')->with('error','Gagal menambah nilai harap aktifkan periode terlebih dahulu');
      }

     $siswa = \App\Siswa::find($idsiswa);
     if($siswa->mapel()->where('mapel_id',$request->mapel)->exists())
     {
    return redirect('siswa/'.$idsiswa. '/profile')->with('error','Data matapelajaran sudah ada.');
    }
        $siswa->mapel()->attach($request->mapel,['p_kd1'=> $request->p_kd1, 'aktif_id' => $periode->id , 'p_kd2'=>$request->p_kd2,'p_kd3'=>$request->p_kd3,'p_kd4'=>$request->p_kd4,'p_kd5'=>$request->p_kd5,'p_kd6'=> $request->p_kd6,'p_kd7'=>$request->p_kd7,'p_kd8'=>$request->p_kd8,'p_kd9'=>$request->p_kd9,'p_kd10'=>$request->p_kd10,'p_deskripsi'=>$request->p_deskripsi,'k_kd1'=>$request->k_kd1,'k_kd2'=>$request->k_kd2,'k_kd3'=>$request->k_kd3,'k_kd4'=>$request->k_kd4,'k_kd5'=>$request->k_kd5,'k_kd6'=>$request->k_kd6,'k_kd7'=>$request->k_kd7,'k_kd8'=>$request->k_kd8,'k_kd9'=>$request->k_kd9,'k_kd10'=>$request->k_kd10,'k_deskripsi'=>$request->k_deskripsi]);


        return redirect('siswa/'.$idsiswa. '/profile')->with('sukses','Data berhasil dimasukkan');

    }

     public function addekstra(request $request,$idsiswa)
    {
      $periode = aktif::where('status', 1) -> first();
      if ($periode->periode== 'off') {
        // Jika Periode kosong / tidak ada yang aktif
        return redirect('siswa/'.$idsiswa. '/profile')->with('error','Gagal menambah nilai harap aktifkan periode terlebih dahulu');
      }

     $siswa = \App\Siswa::find($idsiswa);
     if($siswa->ekstra()->where('ekstra_id',$request->ekstra)->exists())
     {
       return redirect('siswa/'.$idsiswa. '/profile')->with('error','Data matapelajaran sudah ada.');
    }
        $siswa->ekstra()->attach($request->ekstra,['deskripsi'=> $request->deskripsi, 'aktif_id' => $periode->id]);
        return redirect('siswa/'.$idsiswa. '/profile')->with('sukses','Data berhasil dimasukkan');

    }

    public function editnilai(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $mapel_siswa = \App\Mapel::all();
        return view ('siswa/editnilai',['siswa' => $siswa ,'mapel_siswa' => $mapel_siswa]);
    }
     public function nilai(Request $request)
    {
        $siswa = Siswa::all();
        return view ('siswa/nilai',['siswa' => $siswa ]);
    }
    public function deletenilai($idsiswa,$idmapel)
    {
         $siswa = \App\Siswa::find($idsiswa);
         $siswa->mapel()->detach($idmapel);
         return redirect()->back()->with('sukses','Data Nilai Berhasil dihapus');
    }
     public function deleteekstra($idsiswa,$idekstra)
    {
         $siswa = \App\Siswa::find($idsiswa);
         $siswa->ekstra()->detach($idekstra);
         return redirect()->back()->with('sukses','Data Nilai Berhasil dihapus');
    }

    public function export($id)
    {
        $periode  = aktif::where('status', 1) -> first();
        if ($periode->id == 0) {
          // Jika Periode kosong / tidak ada yang aktif
          return redirect('siswa/'.$id. '/profile')->with('error','Gagal mencetak nilai harap aktifkan periode terlebih dahulu');
        }

        $tahun_angkatan = Input::get('ta');
        $semester = Input::get('smt');


        // dd($tahun_angkatan);

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

        // cari total semua nilai
        $total_pengetahuan = [];
        $total_akademik = [];

        foreach($siswa[0]->mapel as $m) {
            // pengetahuan
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd1');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd2');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd3');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd4');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd5');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd6');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd7');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd8');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd9');
            $total_pengetahuan[] = $m->getOriginal('pivot_p_kd10');

            // akademik
            $total_akademik[] = $m->getOriginal('pivot_k_kd1');
            $total_akademik[] = $m->getOriginal('pivot_k_kd2');
            $total_akademik[] = $m->getOriginal('pivot_k_kd3');
            $total_akademik[] = $m->getOriginal('pivot_k_kd4');
            $total_akademik[] = $m->getOriginal('pivot_k_kd5');
            $total_akademik[] = $m->getOriginal('pivot_k_kd6');
            $total_akademik[] = $m->getOriginal('pivot_k_kd7');
            $total_akademik[] = $m->getOriginal('pivot_k_kd8');
            $total_akademik[] = $m->getOriginal('pivot_k_kd9');
            $total_akademik[] = $m->getOriginal('pivot_k_kd10');
        }

        // saran
        $saran = SaranSiswa::whereHas('saran', function($q) use($semester){
            if($semester) {
                $q->where('saran.semester', '=', $semester);
            }
        })->where('siswa_id', '=', $id) -> where('aktif_id', $periode->id) ->get();

        $total_pengetahuan = array_sum($total_pengetahuan);
        $total_akademik = array_sum($total_akademik);

        // Mulok
        $mulok = MulokSiswa::where('siswa_id', $id) -> where('aktif_id', $periode->id) -> get();

        // kehadiran
        $alpa = KehadiranSiswa::where('keterangan', '=', 'alpa') -> where('siswa_id', $id) ->count();
        $izin = KehadiranSiswa::where('keterangan', '=', 'izin') -> where('siswa_id', $id) ->count();
        $sakit = KehadiranSiswa::where('keterangan', '=', 'sakit')-> where('siswa_id', $id) ->count();

        // $pdf = PDF::loadView('export.siswapdf',[
        //     'siswa' => $siswa,
        //     'total_pengetahuan' => $total_pengetahuan,
        //     'total_akademik' => $total_akademik,
        //     'saran' => $saran,
        //     'alpa' => $alpa,
        //     'mulok' => $mulok,
        //     'izin' => $izin,
        //     'sakit' => $sakit
        //     ]);
        // $date=Date("Y-m-d H:i:s", time()+60*60*7);
        // return $pdf->stream();

        $jmlMapel = mapelSiswa::where('siswa_id', $id) ->where('aktif_id', $periode->id)->count();

        $date=Date("Y-m-d H:i:s", time()+60*60*7);
        return view('export.siswapdf') -> with([
            'siswa' => $siswa,
            'total_pengetahuan' => $total_pengetahuan,
            'total_akademik' => $total_akademik,
            'saran' => $saran,
            'jmlMapel' => $jmlMapel,
            'alpa' => $alpa,
            'date => $date',
            'mulok' => $mulok,
            'izin' => $izin,
            'sakit' => $sakit
        ]);
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);

        // import data
        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/siswa');
    }

    public function datasiswa($id)
    {
          $siswa = \App\Siswa::with('mapel')->where('id',$id)->get();
            $pdf = PDF::loadView('export.datasiswapdf',[
            'siswa' => $siswa]);
        return $pdf->stream();
    }

    public function kelas_1(Request $request)
    {

         $siswa = \App\Siswa::where('kelas_id', 'like' , '%1%')->get();


       return view('kelas.kelas_1',['data_siswa'=> $siswa]);
    }
    public function kelas_2(Request $request)
    {

         $siswa = \App\Siswa::where('kelas_id', 'like' , '%2%')->get();


       return view('kelas.kelas_2',['data_siswa'=> $siswa]);
    }
    public function kelas_3(Request $request)
    {

         $siswa = \App\Siswa::where('kelas_id', 'like' , '%3%')->get();


       return view('kelas.kelas_3',['data_siswa'=> $siswa]);
    }
    public function kelas_4(Request $request)
    {

         $siswa = \App\Siswa::where('kelas_id', 'like' , '%4%')->get();


       return view('kelas.kelas_4',['data_siswa'=> $siswa]);
    }
    public function kelas_5(Request $request)
    {

         $siswa = \App\Siswa::where('kelas_id', 'like' , '%5%')->get();


       return view('kelas.kelas_5',['data_siswa'=> $siswa]);
    }
    public function kelas_6(Request $request)
    {

         $siswa = \App\Siswa::where('kelas_id', 'like' , '%6%')->get();


       return view('kelas.kelas_6',['data_siswa'=> $siswa]);
    }


}
