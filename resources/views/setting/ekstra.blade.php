@extends('layout.master')

@section ('content')
<?php use App\aktif; $periodeAll = aktif::all(); $periode  = aktif::where('status', 1) -> first(); ?>
<?php use App\Ekstra; $data = Ekstra::where('tahun_angkatan', $periode->periode) -> where('semester', $periode->semester) -> paginate(6);  ?>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						@if(session('sukses'))
						<div class="alert alert-success" role="allert">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{session('sukses')}}
						</div>
						@endif

						@if(session('error'))
						<div class="alert alert-danger" role="allert">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{session('error')}}
						</div>
						@endif


						<h4 class="pull-left">Ekstrakurikuler</h4>
						<button type="button" class="btn btn-info btn-sm pull-right " data-toggle="modal" data-target="#myModalBuat">Tambah</button>
						<br><br>

						<?php if ($periode->semester == 'off'): ?>
							Periode <code>Tidak Ada</code>
						<?php else: ?>
							Periode <code>{{$periode->periode}}</code>
						<?php endif; ?>

						<input style="margin-top: 10px" placeholder="Cari Data" type="email" class="form-control" id="carikonten">
						<br>
						<div class="table-responsive">
							<table class="table">
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Semester</th>
									<th>Tahun Angkatan</th>
									<th>Aksi</th>
								</tr>

								<?php $nomor = 1 ?>
								<tbody id="konten">
									<?php foreach ($data as $k): ?>
									<tr>
										<td>{{$nomor}}</td>
										<td>{{$k->nama}}</td>
										<td>{{$k->semester}}</td>
										<td>{{$k->tahun_angkatan}}</td>
										<td>
											<form class="" action="/ekstrakurikuler/{{$k->id}}" method="post">
												{{csrf_field()}}
												{{method_field('delete')}}
												<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#Editdata{{$k->id}}" name="button">Edit</button>
											<button type="submit" class="btn btn-danger btn-sm" name="button">Hapus</button>
											</form>
										</td>
									</tr>
									<?php $nomor++ ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						{{$data->links()}}


						<!-- Modal Create -->
						<div id="myModalBuat" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<form class="" action="/ekstrakurikuler" method="post">
										{{csrf_field()}}
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Tambah Ekstrakurikuler</h4>
										</div>
										<div class="modal-body">
											<small>Nama Ekstra</small>
											<input autocomplete="off" required type="text" name="namaEkstra" class="form-control" value="">
											<!-- <br>
											<small>Semester</small>
											<select required class="form-control" name="semester">
												<?php if ($periode->semester != 'off'): ?>
												<option value="{{$periode->semester}}" selected>Semester Saat ini : {{$periode->semester}}</option>
												<?php endif; ?>

												<option value="#" disabled> - Pilih Semester Lain - </option>
												<option value="Ganjil" >Ganjil</option>
												<option value="Genap" >Genap</option>
											</select>
											<br>

											<small>Periode</small>
											<select required class="form-control" name="periode">
												<?php if ($periode->semester != 'off'): ?>
												<option value="{{$periode->periode}}" selected>Periode Saat ini : {{$periode->periode}}</option>
												<?php endif; ?>

												<option value="#" disabled> - Pilih Periode Lain - </option>

												<?php foreach ($periodeAll as $k): ?>
													<?php if ($k->id != 0): ?>
														<option value="{{$k->periode}}" >{{$k->periode}}</option>
													<?php endif; ?>
												<?php endforeach; ?>
											</select> -->
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>

							</div>
						</div>

						<?php foreach ($data as $k): ?>
							<div id="Editdata{{$k->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<form class="" action="/ekstrakurikuler/{{$k->id}}" method="post">
											{{csrf_field()}}
											{{method_field('PUT')}}
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Edit Ekstrakurikuler</h4>
											</div>
											<div class="modal-body">
												<small>Nama Ekstra</small>
												<input autocomplete="off" required type="text" name="namaEkstra" class="form-control" value="{{$k->nama}}">
												<!-- <br>
												<small>Semester</small>
												<select required class="form-control" name="semester">
													<?php if ($periode->semester != 'off'): ?>
													<option value="{{$periode->semester}}" selected>Semester Saat ini : {{$k->semester}}</option>
													<?php endif; ?>

													<option value="#" disabled> - Pilih Semester Lain - </option>
													<option value="Ganjil" >Ganjil</option>
													<option value="Genap" >Genap</option>
												</select>
												<br>

												<small>Periode</small>
												<select required class="form-control" name="periode">
													<?php if ($periode->semester != 'off'): ?>
													<option value="{{$periode->periode}}" selected>Periode Saat ini : {{$k->periode}}</option>
													<?php endif; ?>

													<option value="#" disabled> - Pilih Periode Lain - </option>

													<?php foreach ($periodeAll as $k): ?>
														<?php if ($k->id != 0): ?>
															<option value="{{$k->periode}}" >{{$k->periode}}</option>
														<?php endif; ?>
													<?php endforeach; ?>
												</select> -->
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						<?php endforeach; ?>


						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
						<script>
							$(document).ready(function() {
								$("#carikonten").on("keyup", function() {
									var value = $(this).val().toLowerCase();
									$("#konten tr").filter(function() {
										$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
									});
								});
							});
						</script>
						@stop
