@extends('layout.master')

@section('content')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
			</div>
			@endif
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Siswa</h3>
							<div class="right">
								@if(auth()->user()->role == 'admin' )
								<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>
									<p>Tambah Data</p>
								</button>&nbsp;
								<!--button type="button" class="btn" data-toggle="modal" data-target="#importExcel"><i class="lnr lnr-enter-down">
										<p>Import Excel</p>
									</i></button-->
								@endif
								@if(auth()->user()->role == 'guru' )
								<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>
									<p>Tambah Data</p>
								</button>&nbsp;
								<button type="button" class="btn" data-toggle="modal" data-target="#importExcel"><i class="lnr lnr-enter-down">
										<p>Import Excel</p>
									</i></button>
								@endif

							</div>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<td>Nama</td>
										<td>Kelas</td>
										<td>Jenis Kelamin</td>
										<td>Tempat Lahir</td>
										<td>Tanggal Lahir</td>
										<td>NIS</td>
										<td>Agama</td>
										<td>Alamat</td>
										<td>Tahun Angkatan</td>
										<td>Rata-Rata</td>
										@if(auth()->user()->role == 'admin')
										<td>Aksi</td>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($data_siswa as $siswa)
									<tr>
										<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->name}}</a> </td>
										<td>{{$siswa->kelas_id}}</td>
										<td>{{$siswa->jenis_kelamin}}</td>
										<td>{{$siswa->tempat_lahir}}</td>
										<td>{{$siswa->tgl_lahir}}</td>
										<td>{{$siswa->nis}}</td>
										<td>{{$siswa->agama}}</td>
										<td>{{$siswa->alamat}}</td>
										<td>{{$siswa->tahun_angkatan}}</td>
										<td>{{$siswa->rataRata()}}</td>
										<td>
											@if(auth()->user()->role == 'admin')
											<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
											<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ??')">Delete</a>
											@endif
											@if(auth()->user()->role == 'guru')
											<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
											<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ??')">Delete</a>
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
				</div>
				<div class="modal-body">

					{{ csrf_field() }}

					<label>Pilih file excel</label>
					<div class="form-group">
						<input type="file" name="file" required="required">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Import</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/siswa/create" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
						<label for="exampleInputEmail1">Nama</label>
						<input name="name" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Siswa" value="{{old('name')}}">
						@if($errors->has('name'))
						<span class="help-block">{{$errors->first('name')}}</span>
						@endif
					</div>

					<div class="form-group{{$errors->has('kelas_id') ? ' has-error' : ''}}"">
					   	 <label for=" exampleInputEmail1">Kelas</label>
						<select name="kelas_id" class="form-control form-control-sm">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
						</select>

						<div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}"">
					   	 <label for=" exampleInputEmail1">Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control form-control-sm">
								<option value="L" {{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-Laki</option>
								<option value="P" {{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
							</select>
							@if($errors->has('jenis_kelamin'))
							<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
							@endif
						</div>



						<div class="form-group{{$errors->has('tempat_lahir') ? ' has-error' : ''}}"">
					    <label for=" exampleInputEmail1">Tempat Lahir</label>
							<input name="tempat_lahir" type="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
							@if($errors->has('tempat_lahir'))
							<span class="help-block">{{$errors->first('tempat_lahir')}}</span>
							@endif
						</div>

						<div class="form-group{{$errors->has('tgl_lahir') ? ' has-error' : ''}}"">
					    <label for=" exampleInputEmail1">Tanggal Lahir</label>
							<input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YY-MM-DD" value="{{old('tgl_lahir')}}">
							@if($errors->has('tgl_lahir'))
							<span class="help-block">{{$errors->first('tgl_lahir')}}</span>
							@endif
						</div>

						<div class="form-group{{$errors->has('nis') ? ' has-error' : ''}}"">
					    <label for=" exampleInputEmail1">NIS</label>
							<input name="nis" type="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" value="{{old('nis')}}">
							@if($errors->has('nis'))
							<span class="help-block">{{$errors->first('nis')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}"">
					    <label for=" exampleInputEmail1">Agama</label>
							<input name="agama" type="agama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
							@if($errors->has('agama'))
							<span class="help-block">{{$errors->first('agama')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}"">
				    <label for=" exampleFormControlTextarea1">Alamat</label>
							<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
							@if($errors->has('alamat'))
							<span class="help-block">{{$errors->first('alamat')}}</span>
							@endif
						</div>

						<div class="form-group{{$errors->has('tahun_angkatan') ? ' has-error' : ''}}"">
					    <label for=" exampleInputEmail1">Tahun Angkatan</label>
							<input name="tahun_angkatan" type="tahun_angkatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Angkatan" value="{{old('tahun_angkatan')}}">
							@if($errors->has('tahun_angkatan'))
							<span class="help-block">{{$errors->first('tahun_angkatan')}}</span>
							@endif
						</div>



						<div class="form-group{{$errors->has('password') ? ' has-error' : ''}}"">
					    <label for=" exampleInputPassword1">Password</label>
							<input name="password_siswa" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{old('password_siswa')}}">
							@if($errors->has('password_siswa'))
							<span class="help-block">{{$errors->first('password_siswa')}}</span>
							@endif
						</div>

						<div class="form-group{{$errors->has('profile') ? ' has-error' : ''}}"">
				    <label for=" exampleFormControlTextarea1">Profil</label>
							<input type="file" name="profile" id="exampleInputFile">
							@if($errors->has('profile'))
							<span class="help-block">{{$errors->first('profile')}}</span>
							@endif
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>




@stop
