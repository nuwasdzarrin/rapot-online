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
					<h3 class="panel-title">Data Guru</h3>
					<div class="right"> 
					@if(auth()->user()->role == 'admin')
					<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
					@endif
					</div>	
					</div>
					<div class="panel-body">
					<table class="table table-hover">
					<thead>
					<tr>
					<td>Nama</td>
					<td>NIP</td>
					<td>Alamat</td>
					<td>Jenis Kelamin</td>
					<td>No.Telp</td>
					<td>Email</td>
					<td>Jabatan</td>
					@if(auth()->user()->role == 'admin')
					<td>Aksi</td>
					@endif
					</tr>
					</thead>
					<tbody>
					@foreach($data_guru as $guru)
					<tr>
					<td><a href="/guru/{{$guru->id}}/profile">{{$guru->nama_guru}}</a> </td>
					<td>{{$guru->nip_guru}}</td>
					<td>{{$guru->alamat}}</td>
					<td>{{$guru->jenis_kelamin_guru}}</td>
					<td>{{$guru->no_tlp_guru}}</td>
					<td>{{$guru->email_guru}}</td>
					<td>{{$guru->jabatan_guru}}</td>
					<td>
					@if(auth()->user()->role == 'admin')
					<a href="/guru/{{$guru->id}}/edit" class="btn btn-warning btn-sm" >Edit</a>
					<a href="/guru/{{$guru->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ??')">Delete</a>
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
			 <form action="/guru/create" method="post">
			{{csrf_field()}}
 			<div class="form-group">
			 <label for="exampleInputPassword1">Nama</label>
			 <input name="nama_guru" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama">
			  </div>

			 <div class="form-group">
			 <label for="exampleInputPassword1">NIP</label>
			 <input name="nip_guru" type="text" class="form-control" id="exampleInputPassword1" placeholder="NIP">
			  </div> 
			 <div class="form-group">
			    <label for="exampleFormControlTextarea1">Alamat</label>
			    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			  </div>
			  <div class="form-group">
		    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
		    <select name="jenis_kelamin_guru" class="form-control" id="exampleFormControlSelect1">
		      <option value="L" >Laki-laki</option>
		      <option value="P">Perempuan</option>
		    </select>
		  </div>
 			<div class="form-group">
			 <label for="exampleInputPassword1">No.Telp</label>
			 <input name="no_tlp_guru" type="text" class="form-control" id="exampleInputPassword1" placeholder="No.Telp">
			</div>
		<div class="form-group">
		<label for="exampleFormControlSelect1">Jabtan</label>
		<select name="jabatan_guru" class="form-control" id="exampleFormControlSelect1">
		<option>Kepala Sekolah</option>
		<option >Guru Kelas</option>
		<option >Guru Pengajar</option>
		</select>
		 </div>
			 <div class="form-group">
			 <label for="exampleInputEmail1">Email address</label>
			 <input name="email_guru" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			</div>

			 <div class="form-group">
			 <label for="exampleInputPassword1">Password</label>
			 <input name="password_guru" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			 
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				     <button type="submit" class="btn btn-primary">Submit</button>
				     </form>
				      </div>
				    </div>
				  </div>
				</div>
@stop



