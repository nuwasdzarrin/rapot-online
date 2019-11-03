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
					<h3 class="panel-title">Data Kehadiran</h3>
					<div class="right"> 
					@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
					<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
					@endif
					</div>	
					</div>
					<div class="panel-body">
					<table class="table table-hover">
					<thead>
					<tr>
					<td>Nama</td>
                    <td>Kelas</td>
                    <td>Keterangan</td>
                    <td>Tanggal</td>
					@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
					<td>Aksi</td>
					@endif
					</tr>
					</thead>
					<tbody>
					@foreach($kehadiran as $k)
					<tr>
					<td><a href="/siswa/{{$k->siswa_id}}/profile">{{$k->siswa->name}}</a> </td>
					<td>{{$k->siswa->kelas_id}}</td>
                    <td>{{$k->keterangan}}</td>
                    <td>{{$k->created_at}}</td>
					<td>
					@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
					<a href="/kehadiran/{{$k->id}}/destroy" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus ??')">Delete</a>
					@endif
					</td>			
					</tr>
					@endforeach
					</tbody>
					</table>
					</div>
					</div>
                </div>
                {{ $kehadiran->links() }}									
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
				       <form action="/kehadiran/store" method="post">
				       	{{csrf_field()}}
					  <div class="form-group{{$errors->has('siswa_id') ? ' has-error' : ''}}">
                        <label for="siswa_id">Siswa</label>
                        <select name="siswa_id" class="form-control form-control-sm">
                            @foreach($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->name.' (Kelas '.$s->kelas_id.')' }}</option>
                            @endforeach
						</select>
					  </div>

					  <div class="form-group{{$errors->has('keterangan') ? ' has-error' : ''}}">
                        <label for="keterangan">Keterangan</label>
                        <select name="keterangan" class="form-control form-control-sm">
                        <option value="alpa">Alpa</option>
                         <option value="izin">Izin</option>
                         <option value="sakit">Sakit</option>
						</select>
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



