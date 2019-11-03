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
									 <form action="/guru/{{$guru->id}}/update" method="post" enctype="multipart/form-data">
				       	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama</label>
					    <input name="nama_guru" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Guru" value="{{$guru->nama_guru}}">
					    <small id="nama" class="form-text text-muted"></small>
					  </div>

					   <div class="form-group">
					    <label for="exampleInputEmail1">NIP</label>
					    <input name="nip_guru" type="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP" value="{{$guru->nip_guru}}">
					    <small id="nip" class="form-text text-muted"></small>
					  </div>

					<div class="form-group">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$guru->alamat}}</textarea>
				  </div>

					   <div class="form-group">
					   	<label for="exampleInputEmail1">Jenis Kelamin</label>
					   	<select name="jenis_kelamin_guru" class="form-control form-control-sm">
						 <option value="L" @if($guru->jenis_kelamin_guru == 'L') selected @endif>Laki-Laki</option>
						 <option value="P" @if($guru->jenis_kelamin_guru == 'P') selected @endif >Perempuan</option>
						</select>
					    
					  </div>
					   <div class="form-group">
					    <label for="exampleInputEmail1">No.Telp</label>
					    <input name="no_telp_guru" type="tempat_lahir" class="form-control" id="no_telp_guru" aria-describedby="emailHelp" placeholder="No.Telp" value="{{$guru->no_tlp_guru}}">
					  </div>
					 

					 <div class="form-group">
					   	<label for="exampleInputEmail1">Jabatan</label>
					   	<select name="jabatan_guru" class="form-control form-control-sm">
						<option>Kepala Sekolah</option>
						<option >Guru Kelas</option>
						<option >Guru Pengajar</option>
						</select>

				
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
