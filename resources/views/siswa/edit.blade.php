@extends('layout.master')

@section ('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit</h3>
								</div>
								<div class="panel-body">
									 <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
				       	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama</label>
					    <input name="name" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Siswa" value="{{$siswa->name}}">
					    <small id="nama" class="form-text text-muted"></small>
					  </div>

					   <div class="form-group">
					   	<label for="exampleInputEmail1">Jenis Kelamin</label>
					   	<select name="jenis_kelamin" class="form-control form-control-sm">
						 <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
						 <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
						</select>

						 <div class="form-group">
					   	<label for="exampleInputEmail1">Kelas</label>
					   	<select name="kelas_id" class="form-control form-control-sm">
						 <option @if($siswa->kelas_id == '1') selected @endif>1</option>
						 <option  @if($siswa->kelas_id == '2') selected @endif >2</option>
						 <option  @if($siswa->kelas_id == '3') selected @endif >3</option>
						 <option  @if($siswa->kelas_id == '4') selected @endif >4</option>
						 <option  @if($siswa->kelas_id == '5') selected @endif >5</option>
						 <option  @if($siswa->kelas_id == '6') selected @endif >6</option>
						</select>
					    
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tempat Lahir</label>
					    <input name="tempat_lahir" type="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{$siswa->tempat_lahir}}">

					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Tanggal Lahir</label>
					    <input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YY-MM-DD" value="{{$siswa->tgl_lahir}}">
					  
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">NIS</label>
					    <input name="nis" type="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" value="{{$siswa->nis}}">
					    <small id="nis" class="form-text text-muted"></small>
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">Agama</label>
					    <input name="agama" type="agama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
					    <small id="agama" class="form-text text-muted"></small>
					  </div>
					  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$siswa->alamat}}</textarea>
				  </div>
					  
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tahun Angkatan</label>
					    <input name="tahun_angkatan" type="tahun_angkatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Angkatan" value="{{$siswa->tahun_angkatan}}">
					    <small id="tahun_angkatan" class="form-text text-muted"></small>
					  </div>
					   
					   <div class="form-group">
					    <label for="exampleInputEmail1">Username</label>
					    <input name="username_siswa" type="username_siswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" value="{{$siswa->username_siswa}}">
					    <small id="username_siswa" class="form-text text-muted"></small>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input name="password_siswa" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$siswa->password_siswa}}">
					  </div>
					  
						<br>
					<div class="form-group">
				    <label for="exampleFormControlTextarea1">Profil</label>
						<input type="file" name="profile"  id="exampleInputFile">
						<p>ukuran 3x4</p>
					
				      </div>
				     <button type="submit" class="btn btn-primary btn-warning">Update</button>
				     </form>
								</div>
							</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section ('content1')
		<h1>Edit Data Siswa</h1>
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
		@endif
		<div class="row">
		<div class="col-lg-12">
			 <form action="/siswa/{{$siswa->id}}/update" method="post">
				       	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama</label>
					    <input name="name" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Siswa" value="{{$siswa->name}}">
					    <small id="nama" class="form-text text-muted"></small>
					  </div>

					   <div class="form-group">
					   	<label for="exampleInputEmail1">Jenis Kelamin</label>
					   	<select name="jenis_kelamin" class="form-control form-control-sm">
						 <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
						 <option value="P" @if($siswa->jenis_kelamin == 'L') selected @endif >Perempuan</option>
						</select>
					    
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tempat Lahir</label>
					    <input name="tempat_lahir" type="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{$siswa->tempat_lahir}}">

					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Tanggal Lahir</label>
					    <input name="tgl_lahir" type="tgl_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="YY-MM-DD" value="{{$siswa->tgl_lahir}}">
					  
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">NIS</label>
					    <input name="nis" type="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" value="{{$siswa->nis}}">
					    <small id="nis" class="form-text text-muted"></small>
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">Agama</label>
					    <input name="agama" type="agama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
					    <small id="agama" class="form-text text-muted"></small>
					  </div>
					  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$siswa->alamat}}</textarea>
				  </div>
					  
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tahun Angkatan</label>
					    <input name="tahun_angkatan" type="tahun_angkatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Angkatan" value="{{$siswa->tahun_angkatan}}">
					    <small id="tahun_angkatan" class="form-text text-muted"></small>
					  </div>
					   
					   <div class="form-group">
					    <label for="exampleInputEmail1">Username</label>
					    <input name="username_siswa" type="username_siswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" value="{{$siswa->username_siswa}}">
					    <small id="username_siswa" class="form-text text-muted"></small>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input name="password_siswa" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$siswa->password_siswa}}">
					  </div>
					   <div class="form-group">
					   	 <label for="exampleInputEmail1">Status Aktif</label>
					   	<select name="status_aktif_siswa" class="form-control form-control-sm">
						 <option >1</option>
						 <option>0</option>
						</select>
					  <div class="form-group form-check">
					   
					  </div>
					  
					
				      </div>
				     <button type="submit" class="btn btn-primary btn-warning">Update</button>
				     </form>
				     </div>
		</div>
		@endsection