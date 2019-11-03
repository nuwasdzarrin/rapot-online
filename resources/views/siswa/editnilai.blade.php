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
					    <label for="exampleInputEmail1">Kode</label>
					    <input name="kode" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode" value="{{$mapel_siswa->mapel_id}}">
					    <small id="kode" class="form-text text-muted"></small>
					  </div>

					   <div class="form-group">
					   	<label for="exampleInputEmail1">Mata Pelajaran</label>
					   	<select name="nama" class="form-control form-control-sm">
						 <option >Matematika</option>
						 <option >Bahasa Indonesia</option>
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
					   
					  
					
				      </div>
				     <button type="submit" class="btn btn-primary btn-warning">Update</button>
				     </form>
				     </div>
		</div>
		@endsection