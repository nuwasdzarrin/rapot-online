@extends('layout.master')

@section ('content')
<?php use App\aktif; use App\mapelSiswa; $data = aktif::orderBy('status', 'DESC') -> paginate(5); ?>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{session('sukses')}}
			</div>
			@endif

			@if(session('error'))
			<div class="alert alert-danger" role="alert">
				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{session('error')}}
			</div>
			@endif

			<h4 class="pull-left">Setting Periode</h4>

			<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addPeriod">Tambah</button>

			<input placeholder="Cari Data" type="email" class="form-control" id="carikonten">

				<br>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>No</th>
						<th>Semester</th>
						<th>Periode</th>
						<th>Nilai <b>*</b> </th>
						<th>Status</th>
						<th>Aktivasi</th>
						<th>Aksi</th>
					</tr>

					<?php $nomor = 1; ?>
					<tbody id="kontenperiode">
						<?php foreach ($data as $k): ?>
							<?php if ($k->id != 0): ?>
								<tr>
									<td>{{$nomor}}</td>
									<td>{{$k->semester}}</td>
									<td>{{$k->periode}}</td>

									<td>
										<?php echo mapelSiswa::where('aktif_id', $k->id) -> count(); ?> Nilai
									</td>

									<td>
										<?php if ($k->status == 0): ?>
											Tidak Aktif
											<?php else: ?>
												<span class="text-success">Aktif</span>
										<?php endif; ?>
									</td>

									<td>
										<?php if ($k->status == 0): ?>
											<?php $checker = aktif::where('status', 1) -> where('id', '!=' , 0) ->count(); ?>

											<?php if ($checker == 0): ?>
												<form class="" action="/aktifkan/{{$k->id}}" method="post">
														{{ csrf_field() }}
														{{method_field('PUT')}}
														<input type="hidden" name="code" value="1">
														<button type="submit" style="width: 100%" onclick="return confirm('Aktifkan Periode ??')" class="btn btn-success m-1 btn-sm" name="button">Aktifkan</button>
												</form>
												<?php else: ?>
													<button type="button" style="width: 100%" disabled class="btn btn-success m-1 btn-sm" name="button">Aktifkan</button>
											<?php endif; ?>
										<?php else: ?>
											<form class="" action="/aktifkan/{{$k->id}}" method="post">
													{{ csrf_field() }}
													{{method_field('PUT')}}
													<input type="hidden" name="code" value="0">
													<button type="submit" onclick="return confirm('Yakin Menonaktifkan Periode ??')" style="width: 100%" class="btn btn-danger m-1 btn-sm" name="button">Nonaktifkan</button>
											</form>
										<?php endif; ?>
									</td>

									<td>
										<form class="" action="/aktif/{{$k->id}}" method="post">
												{{ csrf_field() }}
												{{method_field('DELETE')}}
												<a href="#">
														<button type="button" data-toggle="modal" data-target="#editPeriod{{$k->id}}" class="btn btn-primary m-1 btn-sm" name="button"> Edit </button>
												</a>
												<button type="submit" onclick="return confirm('Yakin Hapus ??')" class="btn btn-danger m-1 btn-sm" name="button">Delete</button>
										</form>
									</td>
								</tr>
								<?php $nomor++; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
				<br>
				<small> <b>*</b> Matikan periode yang sedang aktif jika ingin mengaktifkan periode lainnya</small>
				<div><small> <b>*</b> Menampilkan ada berapa nilai siswa pada periode tersebut</small></div>
				<br>
				{{$data->links()}}
			</div>
		</div>
	</div>
</div>

<?php foreach ($data as $k): ?>
	<!-- Modal Edit -->
	<div id="editPeriod{{$k->id}}" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <form class="" action="/aktif/{{$k->id}}" method="post">
	      {{ csrf_field() }}
				{{method_field('PUT')}}
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Edit Periode</h4>
	        </div>
	        <div class="modal-body">

	          <small>Pilih Semester</small>
	          <select required class="form-control" name="semester">
							<option value="{{$k->semester}}" selected>Saat Ini : {{$k->semester}}</option>
	            <option disabled value="#">Pilih Semester</option>
	            <option value="Ganjil">Ganjil</option>
	            <option value="Genap">Genap</option>
	          </select>
	          <br>
	          <small>Masukan Periode</small>
	          <input type="text" name="periode" class="form-control" placeholder="Periode" required value="{{$k->periode}}">
	        </div>
	        <div class="modal-footer">
	          <button type="submit" class="btn btn-success" name="button">Simpan</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	        </div>
	      </div>
	    </form>

	  </div>
	</div>
<?php endforeach; ?>

<!-- Modal -->
<div id="addPeriod" class="modal fade" role="dialog">
  <div class="modal-dialog">

<form class="" action="/aktif" method="post">
	{{ csrf_field() }}
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Tambah Periode</h4>
		</div>
		<div class="modal-body">

			<small>Pilih Semester</small>
			<select required class="form-control" name="semester">
				<option disabled selected value="#">Pilih Semester</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
			</select>
			<br>
			<small>Masukan Periode</small>
			<div class="row">
				<div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
					<input type="number" name="period1" class="form-control" placeholder="Tahun Pertama" required value="">
				</div>

				<div class="col-lg-2 text-center col-sm-2 col-md-2 col-xs-2">
					/
				</div>

				<div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
					<input type="number" name="period2" class="form-control" placeholder="Tahun Kedua" required value="">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-success" name="button">Simpan</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		</div>
	</div>
</form>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#carikonten").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#kontenperiode tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@stop
