<?php use App\aktif; $periode  = aktif::where('status', 1) -> first(); ?>

<div class="profile-right">
@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
Tambah Nilai
</button>


@endif
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Kokurikuler dan Ekstrakulikuler</h3>
	</div>
		<div class="panel-body table-responsive">
			<table class="table table-striped">
			<thead>
			<tr>
			<th>Kegiatan KO dan Ekstraklikuler</th>
			<th>Semester</th>
			<th>Periode</th>
			<th>Deskripsi</th>
			<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
			@foreach($siswa->ekstra as $ekstra)
			<tr>

			<td>{{$ekstra->nama}}</td>
			<td>{{$periode->semester}}</td>
			<td> {{$periode -> periode}} </td>
			<td>{{$ekstra->pivot->deskripsi}}</td>
			<td>
		    &nbsp
			<a href="/siswa/{{$siswa->id}}/{{$ekstra->id}}/deleteekstra" class="lnr lnr-trash" onclick="return confirm('Yakin Hapus ??')"></a>
			</td>
			</tr>
			@endforeach
		</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nilai Kokurikuler dan Ekstrakulikuler</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/{{$siswa->id}}/addekstra" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
				<label for="ekstra">Kegiatan KO dan Ekstrakulikuler</label>
				<select class="form-control" id="ekstra" name="ekstra">
					@foreach($ekstrakulikuler as $ek)
					<option value="{{$ek->id}}">{{$ek->nama}}</option>
					@endforeach
				</select>

				 <div class="form-group{{$errors->has('semester') ? ' has-error' : ''}}"">
					   	 <label for="exampleInputEmail1">Semester</label>
					   	<select name="semester" class="form-control form-control-sm">
						 <option >Gansal</option>
						 <option >Genap</option>
						  </select>

				 <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Deskripsi</label>
				<input name="deskripsi" type="ekstra" class="form-control" id="ekstra" aria-describedby="emailHelp" placeholder="Deskripsi" value="{{old('deskripsi')}}">
				@if($errors->has('deskripsi'))
				<span class="help-block">{{$errors->first('deskripsi')}}</span>
				 @endif
				 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>

      </div>
	</div>
  </div>
</div>
