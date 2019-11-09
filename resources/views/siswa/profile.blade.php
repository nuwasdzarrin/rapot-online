@extends('layout.master')

@section('header')
<?php use App\aktif; use App\kkm;
 $periode = aktif::where('status', 1) -> first(); $kkm = kkm::where('id', 1) -> first(); $kkm = kkm::where('id', 1) -> first(); ?>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section ('content')

<style media="screen">
.panel-body, .profile-right, .profile-left {
	padding-left: 12px !important;
	padding-right: 12px !important;
}

.img-circle {
    width: 120px !important;
}

</style>

<?php if ($periode->id == 0): ?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script type="text/javascript">
	Swal.fire({
		type: 'error',
		title: 'Peringatan',
		text: 'Tidak ada periode aktif, beberapa fungsi pada halaman ini mungkin tidak bekerja. Silahkan tekan tombol aktifasi dibawah, pilih periode lalu refresh laman ini',
		footer: '<a target="_blank" href="/aktif">Aktifkan Periode</a>'
})
	</script>
<?php endif; ?>

<!-- Modal -->
<div id="TambahSaranSiswa" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form class="" action="/siswa/addsaransiswa/{{$siswa->id}}" method="post">
{{csrf_field()}}
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Saran Siswa</h4>
	      </div>
	      <div class="modal-body">
	        <small>Silahkan masukan Saran untuk {{$siswa->name}} dengan in {{$siswa->id}}</small>
					<textarea required style="resize: none" name="deskripsiSaran" rows="6" class="form-control" placeholder="Tulis Saran"></textarea>
	      </div>
	      <div class="modal-footer">
					<button type="submit" class="btn btn-primary" >Simpan</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
</form>

  </div>
</div>



<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session('sukses'))
					<div class="alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
					@endif

					@if(session('error'))
					<div class="alert alert-danger" role="alert">
					  {{session('error')}}
					</div>
					@endif

					<h4 style="margin-bottom: -2px">Profil {{$siswa->name}}</h4>

					<?php if ($periode->id == 0): ?>
						<small><span>Periode Saat ini : <code>Tidak Ada</code> </span></small>
					<?php else: ?>
						<small><span>Periode Saat ini : <code>{{$periode->semester}} - {{$periode->periode}}</code> </span></small>
					<?php endif; ?>

					<div class="panel panel-profile" style="margin-top: 14px">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getProfile()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$siswa->name}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">

											{{$siswa->mapel->count()}}<span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
											{{$siswa->rataRata()}}<span>Rata-Rata</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Tempat Lahir <span>{{$siswa->tempat_lahir}}</span></li>
											<li>Tanggal Lahir <span>{{$siswa->tgl_lahir}}</span></li>
											<li>NIS <span>{{$siswa->nis}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>Alamat<span>{{$siswa->alamat}}</span></li>
											<li>Tahun Angkatan<span>{{$siswa->tahun_angkatan}}</span></li>
										</ul>
									</div>
									<div class="text-center">
										<a href="{{ url('/siswa/datasiswa/'.$siswa->id) }}" class="btn btn-primary" style="width: 40%">Cetak</a>
										<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary" style="width: 40%">Edit Profile</a></div>
									</div>

								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->

							<div class="profile-right">
							<form action="{{ url('/siswa/export/'.$siswa->id) }}" method="GET">
								<input type="hidden" name="ta">
								<input type="hidden" name="smt">
								<button type="submit" class="btn btn-primary btn-cetak">Cetak</button>
								@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Nilai
								</button>
								@endif


							</form>
	
							<div class="wrap-opsi">
								<!-- <p>Cetak berdasarkan :</p> -->
								<!-- <div class="row">
									<div class="form-group col-md-6">
										<label for="semester">Semester</label>
										<select name="semester" id="semester" class="form-control">
											<option value="">Semua</option>
											@foreach($semester as $smt)
											<option value="{{ $smt['semester'] }}">{{ $smt['semester'] }}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group col-md-6">
										<label for="tahun_angkatan">Periode</label>
										<select name="tahun_angkatan" id="tahun_angkatan" class="form-control">
											<option value="">Semua</option>
											@foreach($tahun_angkatan as $ta)
											<option value="{{ $ta['tahun_angkatan'] }}">{{ $ta['tahun_angkatan'] }}</option>
											@endforeach
										</select>
									</div>
								</div> -->
							</div>
								<div class="panel">
								<div class="panel-heading">

								</div>
								<div class="panel-body table-responsive">
									<table class="table table-striped">
										<thead>
										<td rowspan="2" align="center">Muatan Pelajaran</td>
										<td rowspan="2" align="center">Semester</td>
										<td rowspan="2" align="center">Periode</td>
										<td colspan="8" align="center">Pengetahuan</td>
										<td colspan="8" align="center">Keterampilan</td>
									</tr>
									<tr>
										<td  align="center">KD 3.1</td>
										<td  align="center">KD 3.2</td>
										<td  align="center">KD 3.3</td>
										<td  align="center">KD 3.4</td>
										<td  align="center">KD 3.5</td>
										<td  align="center">KD 3.6</td>
										<td  align="center">KD 3.7</td>
										<td  align="center">KD 3.8</td>
										<td  align="center">KD 3.9</td>
										<td  align="center">KD 3.10</td>
										<td  align="center">NIlai Akhir</td>
										<td  align="center">Predikat</td>
										<td  align="center">Deskripsi</td>
										<td  align="center">KD 4.1</td>
										<td  align="center">KD 4.2</td>
										<td  align="center">KD 4.3</td>
										<td  align="center">KD 4.4</td>
										<td  align="center">KD 4.5</td>
										<td  align="center">KD 4.6</td>
										<td  align="center">KD 4.7</td>
										<td  align="center">KD 4.8</td>
										<td  align="center">KD 4.9</td>
										<td  align="center">KD 4.10</td>
										<td  align="center">NIlai Akhir</td>
										<td  align="center">Predikat</td>
										<td  align="center">Deskripsi</td>
										<td  align="center">Aksi</td>
										</tr>



										</thead>
										<tbody>
											@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td> {{$periode -> periode}} </td>

												<td><a  class="p_kd1" data-type="text" data-nilai="p_kd1" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai " type="number" data-title="Input Nilai">{{$mapel->pivot->p_kd1}}</a></td>

												<td><a class="p_kd2" data-type="text" data-nilai="p_kd2" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd2}}</a></td>
												<td><a  class="p_kd3" data-type="text" data-nilai="p_kd3" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd3}}</a></td>
												<td><a  class="p_kd4" data-type="text" data-nilai="p_kd4" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd4}}</a></td>
												<td><a class="p_kd5" data-type="text" data-nilai="p_kd5" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd5}}</a></td>

												<td><a class="p_kd6" data-type="text" data-nilai="p_kd6" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd6}}</a></td>
												<td><a  class="p_kd7" data-type="text" data-nilai="p_kd7" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd7}}</a></td>
												<td><a  class="p_kd8" data-type="text" data-nilai="p_kd8" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd8}}</a></td>
												<td><a class="p_kd9" data-type="text" data-nilai="p_kd9" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_kd9}}</a></td>
												<td><a  class="p_kd10" data-type="text" data-nilai="p_kd10" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai " type="number" data-title="Input Nilai">{{$mapel->pivot->p_kd10}}</a></td>

												<td>
													<a  class="nilai akhir" id="mean{{$mapel->id}}" data-type="text" data-nilai="nilai akhir" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai"></a>

													<script>
						               					var xjml{{$mapel->id}} = {{$mapel->pivot->p_kd1+$mapel->pivot->p_kd2+$mapel->pivot->p_kd3+$mapel->pivot->p_kd4+$mapel->pivot->p_kd5+$mapel->pivot->p_kd6+$mapel->pivot->p_kd7+$mapel->pivot->p_kd8+$mapel->pivot->p_kd9+$mapel->pivot->p_kd10}}; // Hasil Jumlah Semua Mapel yg ada

														var xMean{{$mapel->id}} = xjml{{$mapel->id}}  /
														(	<?php if ($mapel->pivot->p_kd1 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd2 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd3 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->p_kd4 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd5 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd6 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->p_kd7 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd8 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd9 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->p_kd10 != 0): ?>1<?php endif; ?> +
														 0);
						                					
						                					document.getElementById("mean{{$mapel->id}}").innerHTML = xMean{{$mapel->id}};
						              				</script>
												</td>



												<td><a  class="p_predikat" data-nilai="_p_predikat" data-type="text" data-pk="{{$mapel->id}}"  data-title="Input Nilai">
												<span id="hasilPengetahuan{{$mapel->id}}"></span>
												<script type="text/javascript">
													// Pengetahuan
													var xbagijml{{$mapel->id}} = {{$mapel->pivot->p_kd1+$mapel->pivot->p_kd2+$mapel->pivot->p_kd3+$mapel->pivot->p_kd4+$mapel->pivot->p_kd5+$mapel->pivot->p_kd6+$mapel->pivot->p_kd7+$mapel->pivot->p_kd8+$mapel->pivot->p_kd9+$mapel->pivot->p_kd10}};

													// Mengumpulkan pembaginya
													var bagiPengetahuan{{$mapel->id}} = 
															<?php if ($mapel->pivot->p_kd1 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd2 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd3 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->p_kd4 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd5 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd6 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->p_kd7 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd8 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->p_kd9 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->p_kd10 != 0): ?>1<?php endif; ?> +0
															 ;

													var predikatPengetahuan{{$mapel->id}} = xbagijml{{$mapel->id}} / bagiPengetahuan{{$mapel->id}};

															 if (predikatPengetahuan<?php echo $mapel->id ?> >= <?php echo $kkm->predA2 ?> && predikatPengetahuan<?php echo $mapel->id ?> <= <?php echo $kkm->predA1 ?> ) {
															 	document.getElementById('hasilPengetahuan<?php echo $mapel->id ?>').innerHTML = "A";
															 }

															 if (predikatPengetahuan<?php echo $mapel->id ?> >= <?php echo $kkm->predB2 ?> && predikatPengetahuan<?php echo $mapel->id ?> <= <?php echo $kkm->predB1 ?> ) 
															{
																document.getElementById('hasilPengetahuan<?php echo $mapel->id ?>').innerHTML = "B" ;
															}
															
															if (predikatPengetahuan<?php echo $mapel->id ?> >= <?php echo $kkm->predC2?> && predikatPengetahuan<?php echo $mapel->id ?> <= <?php echo $kkm->predC1 ?> ) 
															{
																document.getElementById('hasilPengetahuan<?php echo $mapel->id ?>').innerHTML = "C" ;
															}
															
															if (predikatPengetahuan<?php echo $mapel->id ?> >= <?php echo $kkm->predD2 ?> && predikatPengetahuan<?php echo $mapel->id ?> <= <?php echo $kkm->predD1 ?> ) 
															{
																document.getElementById('hasilPengetahuan<?php echo $mapel->id ?>').innerHTML = "D" ;
															}
													
												</script>



												</a></td>

												<td><a  class="p_deskripsi" data-nilai="p_deskripsi" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->p_deskripsi}}</a></td>

												<td><a  class="k_kd1" data-nilai="k_kd1" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd1}}</a></td>

												<td><a  class="k_kd2" data-nilai="k_kd2" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd2}}</a></td>

												<td><a  class="k_kd3" data-nilai="k_kd3" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd3}}</a></td>

												<td><a  class="k_kd4" data-nilai="k_kd4" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd4}}</a></td>

												<td><a class="k_kd5" data-nilai="k_kd5" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd5}}</a></td>

												<td><a  class="k_kd6" data-nilai="k_kd6" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd6}}</a></td>

												<td><a  class="k_kd7" data-nilai="k_kd7" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd7}}</a></td>

												<td><a  class="k_kd8" data-nilai="k_kd8" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd8}}</a></td>

												<td><a  class="k_kd9" data-nilai="k_kd9" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd9}}</a></td>

												<td><a class="k_kd10" data-nilai="k_kd10" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_kd10}}</a></td>


												<td><a class="nilai akhir" data-nilai="nilai akhir" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">
													<span id="meannilaiKet{{$mapel->id}}"></span>

													<script type="text/javascript">
														var jmlnilaiKet{{$mapel->id}} = {{$mapel->pivot->k_kd1 + $mapel->pivot->k_kd2 + $mapel->pivot->k_kd3 + $mapel->pivot->k_kd4 + $mapel->pivot->k_kd5 + $mapel->pivot->k_kd6 + $mapel->pivot->k_kd7 + $mapel->pivot->k_kd8 + $mapel->pivot->k_kd9 + $mapel->pivot->k_kd10}};

														var xMeanket{{$mapel->id}} = jmlnilaiKet{{$mapel->id}}  /
														(	<?php if ($mapel->pivot->k_kd1 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->k_kd2 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->k_kd3 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->k_kd4 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->k_kd5 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->k_kd6 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->k_kd7 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->k_kd8 != 0): ?>1<?php endif; ?> + 
															<?php if ($mapel->pivot->k_kd9 != 0): ?>1<?php endif; ?> +
															<?php if ($mapel->pivot->k_kd10 != 0): ?>1<?php endif; ?> +
														 0);

														 document.getElementById('meannilaiKet{{$mapel->id}}').innerHTML = xMeanket{{$mapel->id}};

													</script>
												</a></td>


												<td>
													<a  class="k_predikat" data-nilai="k_predikat" data-type="text" data-pk="{{$mapel->id}}"  data-title="Input Nilai">
														
														<span id="hasilKeterampilan{{$mapel->id}}"></span>
														<script type="text/javascript">
															var xbagijmlKet{{$mapel->id}} = 
															{{
																$mapel->pivot->k_kd1+
																$mapel->pivot->k_kd2+
																$mapel->pivot->k_kd3+
																$mapel->pivot->k_kd4+
																$mapel->pivot->k_kd5+
																$mapel->pivot->k_kd6+
																$mapel->pivot->k_kd7+
																$mapel->pivot->k_kd8+
																$mapel->pivot->k_kd9+
																$mapel->pivot->k_kd10
															}};

															// Kumpulkan pembagi
															var bagiKeterampilan{{$mapel->id}} = 
																<?php if ($mapel->pivot->k_kd1 != 0): ?>1<?php endif; ?> + 
																<?php if ($mapel->pivot->k_kd2 != 0): ?>1<?php endif; ?> + 
																<?php if ($mapel->pivot->k_kd3 != 0): ?>1<?php endif; ?> +
																<?php if ($mapel->pivot->k_kd4 != 0): ?>1<?php endif; ?> + 
																<?php if ($mapel->pivot->k_kd5 != 0): ?>1<?php endif; ?> + 
																<?php if ($mapel->pivot->k_kd6 != 0): ?>1<?php endif; ?> +
																<?php if ($mapel->pivot->k_kd7 != 0): ?>1<?php endif; ?> + 
																<?php if ($mapel->pivot->k_kd8 != 0): ?>1<?php endif; ?> + 
																<?php if ($mapel->pivot->k_kd9 != 0): ?>1<?php endif; ?> +
																<?php if ($mapel->pivot->k_kd10 != 0): ?>1<?php endif; ?> + 0;

															var predKet{{$mapel->id}} = xbagijmlKet{{$mapel->id}} / bagiKeterampilan{{$mapel->id}};

															if (predKet<?php echo $mapel->id ?> >= <?php echo $kkm->predA2 ?> && predKet<?php echo $mapel->id ?> <= <?php echo $kkm->predA1 ?> ) {
															 	document.getElementById('hasilKeterampilan<?php echo $mapel->id ?>').innerHTML = "A";
															 }

															 if (predKet<?php echo $mapel->id ?> >= <?php echo $kkm->predB2 ?> && predKet<?php echo $mapel->id ?> <= <?php echo $kkm->predB1 ?> ) 
															{
																document.getElementById('hasilKeterampilan<?php echo $mapel->id ?>').innerHTML = "B" ;
															}
															
															if (predKet<?php echo $mapel->id ?> >= <?php echo $kkm->predC2?> && predKet<?php echo $mapel->id ?> <= <?php echo $kkm->predC1 ?> ) 
															{
																document.getElementById('hasilKeterampilan<?php echo $mapel->id ?>').innerHTML = "C" ;
															}
															
															if (predKet<?php echo $mapel->id ?> >= <?php echo $kkm->predD2 ?> && predKet<?php echo $mapel->id ?> <= <?php echo $kkm->predD1 ?> ) 
															{
																document.getElementById('hasilKeterampilan<?php echo $mapel->id ?>').innerHTML = "D" ;
															}
															
														</script>
													</a>
</td>

												<td><a  class="k_deskripsi" data-nilai="k_deskripsi" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mapel->pivot->k_deskripsi}}</a></td>
												<td>
													<a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="lnr lnr-trash" onclick="return confirm('Yakin Hapus ??')"></a>
												</td>
											</tr>

											@endforeach

								</tbody>

									</table>

								</div>
							</div>

							<h4 class="pull-left">Saran</h4>
							
							<?php if (Auth::user()->role != 'siswa'): ?>
								<button data-toggle="modal" data-target="#TambahSaranSiswa" class="btn btn-primary btn-sm pull-right" type="button" name="button">Tambah Saran</button>
							<?php endif ?>

							<div style="margin-top: 50px" class="profile-info ">
								<table class="table">
									<thead>
										<th>Periode</th>
										<th>Semester</th>
										<th>Saran</th>
									</thead>
									<tbody>
										@foreach($saran as $d)
										<tr>
											<td>{{ ucfirst($d->saran->periode) }}</td>
											<td>{{ ucfirst($d->saran->semester) }}</td>
											<td><a href="#" class="k_kd1" data-type="text" data-pk="{{ $d->id }}" data-url="/api/saran/{{$d->id}}/update" data-title="Input Saran">{{ $d->deskripsi }}</a></td>
										</tr>
										@endforeach
									</tbody>

								</table>
							</div>
							</div>


	<!-- Button trigger modal -->
 @include('layout.includes._ekstra')
@include('layout.includes._mulok')
 </div>					
@include('layout.includes._nilaisikap')
 




			<!-- END MAIN CONTENT -->
		</div>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/{{$siswa->id}}/addnilai" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="mapel">Mata Pelajaran</label>
				<select class="form-control" id="mapel" name="mapel">
					@foreach($matapelajaran as $mp)
					<option value="{{$mp->id}}">{{$mp->nama}}</option>
					@endforeach
				</select>


				<h4> Nilai Pengetahuan</h4>
				<div class="form-group{{$errors->has('p_kd1') ? ' has-error' : ''}}"">

				<label for="exampleInputEmail1">KD 3.1</label>
				<input name="p_kd1" onkeypress="return hanyaAngka(event);" type="text" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Nilai KD 1" value="0">
				@if($errors->has('p_kd1'))
				<span class="help-block">{{$errors->first('p_kd1')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('p_kd2') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.2</label>
				<input name="p_kd2" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 2" value="0">
				@if($errors->has('p_kd2'))
				<span class="help-block">{{$errors->first('p_kd2')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('p_kd3') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.3</label>
				<input name="p_kd3" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 3" value="0">
				@if($errors->has('p_kd3'))
				<span class="help-block">{{$errors->first('p_kd3')}}</span>
				 @endif
				 </div>

				  <div class="form-group{{$errors->has('p_kd4') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.4</label>
				<input name="p_kd4" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 4" value="0">
				@if($errors->has('p_kd4'))
				<span class="help-block">{{$errors->first('p_kd4')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('p_kd5') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Kd 3.5</label>
				<input name="p_kd5" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 5" value="0">
				@if($errors->has('p_kd5'))
				<span class="help-block">{{$errors->first('p_kd5')}}</span>
				 @endif
				 </div>
				<div class="form-group{{$errors->has('p_kd6') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.6</label>
				<input name="p_kd6" onkeypress="return hanyaAngka(event);" type="text" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Nilai KD 6" value="0">
				@if($errors->has('p_kd6'))
				<span class="help-block">{{$errors->first('p_kd6')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('p_kd7') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.7</label>
				<input name="p_kd7" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 7" value="0">
				@if($errors->has('p_kd7'))
				<span class="help-block">{{$errors->first('p_kd7')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('p_kd8') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.8</label>
				<input name="p_kd8" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 8" value="0">
				@if($errors->has('p_kd8'))
				<span class="help-block">{{$errors->first('p_kd8')}}</span>
				 @endif
				 </div>

				  <div class="form-group{{$errors->has('p_kd9') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.9</label>
				<input name="p_kd9" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 9" value="0">
				@if($errors->has('p_kd9'))
				<span class="help-block">{{$errors->first('p_kd9')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('p_kd10') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Kd 3.10</label>
				<input name="p_kd10" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 10" value="0">
				@if($errors->has('p_kd10'))
				<span class="help-block">{{$errors->first('p_kd10')}}</span>
				 @endif
				 </div>


				 <div class="form-group{{$errors->has('p_deskripsi') ? ' has-error' : ''}}"">
				    <label for="exampleFormControlTextarea1">Deskripsi</label>
				    <textarea name="p_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('p_deskripsi')}}</textarea>
				     @if($errors->has('p_deskripsi'))
					   <span class="help-block">{{$errors->first('p_deskripsi')}}</span>
					   @endif
				  </div>


				  <h4> Nilai Keterampilan</h4>
				<div class="form-group{{$errors->has('k_kd1') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Nilai KD 4.1</label>
				<input name="k_kd1" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 1" value="0">
				@if($errors->has('k_kd1'))
				<span class="help-block">{{$errors->first('k_kd1')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('k_kd2') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Nilai KD 4.2</label>
				<input name="k_kd2" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 2" value="0">
				@if($errors->has('k_kd2'))
				<span class="help-block">{{$errors->first('k_kd2')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('k_kd3') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.3</label>
				<input name="k_kd3" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 3" value="0">
				@if($errors->has('k_kd3'))
				<span class="help-block">{{$errors->first('k_kd3')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_kd4') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.4</label>
				<input name="k_kd4" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 4" value="0">
				@if($errors->has('k_kd4'))
				<span class="help-block">{{$errors->first('k_kd4')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_kd5') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.5</label>
				<input name="k_kd5" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 5" value="0">
				@if($errors->has('k_kd5'))
				<span class="help-block">{{$errors->first('k_kd5')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_kd6') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.6</label>
				<input name="k_kd6" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 6" value="0">
				@if($errors->has('k_kd6'))
				<span class="help-block">{{$errors->first('k_kd6')}}</span>
				 @endif
				 </div>

				  <div class="form-group{{$errors->has('k_kd7') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1"> KD 4.7 </label>
				<input name="k_kd7" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Nilai KD 7 " value="0">
				@if($errors->has('k_kd7'))
				<span class="help-block">{{$errors->first('k_kd7')}}</span>
				 @endif
				 </div>
				  <div class="form-group{{$errors->has('k_kd8') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.8</label>
				<input name="k_kd8" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 8" value="0">
				@if($errors->has('k_kd8'))
				<span class="help-block">{{$errors->first('k_kd8')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_kd9') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.9</label>
				<input name="k_kd9" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 9" value="0">
				@if($errors->has('k_kd9'))
				<span class="help-block">{{$errors->first('k_kd9')}}</span>
				 @endif
				 </div>

				  <div class="form-group{{$errors->has('k_kd10') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1"> KD 4.10 </label>
				<input name="k_kd10" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Nilai KD 10 " value="0">
				@if($errors->has('k_kd10'))
				<span class="help-block">{{$errors->first('k_kd10')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_deskripsi') ? ' has-error' : ''}}"">
				    <label for="exampleFormControlTextarea1">Deskripsi</label>
				    <textarea name="k_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('k_deskripsi')}}</textarea>
				     @if($errors->has('k_deskripsi'))
					   <span class="help-block">{{$errors->first('k_deskripsi')}}</span>
					   @endif

				  </div>
<script type="text/javascript">
	function hanyaAngka(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
			return true;
		}
	}
</script>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </form>
	</div>
  </div>
</div>




@stop


@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script >
	@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
	$(document).ready(function() {
		$('.p_kd1').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd2').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd3').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd4').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd5').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
		$('.p_kd6').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd7').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd8').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd9').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_kd10').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.p_deskripsi').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd1').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd2').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd3').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd4').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd5').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
		 $('.k_kd6').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd7').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd8').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd9').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
        $('.k_kd10').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
		 $('.k_deskripsi').editable({
			params: function(params){
				params.nilai = $(this).data('nilai');
				return params;
			}
		});
		@endif

		$('select[name="tahun_angkatan"]').on('change', function() {
			var val = $(this).find(':selected').val();

			$('input[name="ta"]').val(decodeURIComponent(val));
		});

		$('select[name="semester"]').on('change', function() {
			var val = $(this).find(':selected').val();

			$('input[name="smt"]').val(val);
		});
	});
</script>
@stop
