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
									 <form action="/operator/{{$data_admin->id}}/update" method="post" enctype="multipart/form-data">
				       	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama</label>
					    <input name="nama" type="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama " value="{{$data_admin->nama}}">
					    <small id="nama" class="form-text text-muted"></small>
					  </div>

					<div class="form-group">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$data_admin->alamat}}</textarea>
				  </div>

					   <div class="form-group">
					   	<label for="exampleInputEmail1">Jenis Kelamin</label>
					   	<select name="jenis_kelamin" class="form-control form-control-sm">
						 <option value="L" @if($data_admin->jenis_kelamin_guru == 'L') selected @endif>Laki-Laki</option>
						 <option value="P" @if($data_admin->jenis_kelamin_guru == 'P') selected @endif >Perempuan</option>
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
