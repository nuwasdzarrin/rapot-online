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
					<h3 class="panel-title">Data Admin</h3>
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
					<td>Alamat</td>
					<td>Jenis Kelamin</td>
					<td>Aksi</td>
					</tr>
					</thead>
					<tbody>
					@foreach($data_admin as $admin)
					<tr>
					<td>{{$admin->nama}} </td>
					<td>{{$admin->alamat}}</td>
					<td>{{$admin->jenis_kelamin}}</td>
					<td>
					@if(auth()->user()->role == 'admin')
					<a href="/operator/{{$admin->id}}/edit" class="btn btn-warning btn-sm" >Edit</a>
					<a href="/operator/{{$admin->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ??')">Delete</a>
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
				       <form action="/operator/create" method="post" enctype="multipart/form-data">
				       	{{csrf_field()}}
					  <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
					    <label for="exampleInputEmail1">Nama</label>
					    <input name="nama" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{old('nama')}}" >
					   @if($errors->has('nama'))
					   <span class="help-block">{{$errors->first('nama')}}</span>
					   @endif
					  </div>


					  <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}"">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
				     @if($errors->has('alamat'))
					   <span class="help-block">{{$errors->first('alamat')}}</span>
					   @endif
				  </div>

					   <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}"">
					   	 <label for="exampleInputEmail1">Jenis Kelamin</label>
					   	<select name="jenis_kelamin" class="form-control form-control-sm">
						 <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-Laki</option>
						 <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
						</select>
					     @if($errors->has('jenis_kelamin'))
					   <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
					   @endif
					    </div>

					   <div class="form-group{{$errors->has('username') ? ' has-error' : ''}}"">
					    <label for="exampleInputEmail1">Username</label>
					    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" value="{{old('username')}}">
					     @if($errors->has('username'))
					   <span class="help-block">{{$errors->first('username')}}</span>
					   @endif
					  </div>

					  <div class="form-group{{$errors->has('password') ? ' has-error' : ''}}"">
					    <label for="exampleInputPassword1">Password</label>
					    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{old('password')}}">
					     @if($errors->has('password'))
					   <span class="help-block">{{$errors->first('password')}}</span>
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
@stop



