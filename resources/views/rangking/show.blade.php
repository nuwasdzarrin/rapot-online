@extends('layout.master')

@section ('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Siswa</h3>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Rangking</th>
											<th>Nama</th>
											<th>Jumlah</th>
											<th>Kelas</th>
										</tr>
									</thead>
									<tbody>
										@php
										$rangking = 1;
										@endphp
										@foreach($siswa as $s)
										<tr>
											<td>{{$rangking}}</td>
											<td>{{$s->name}}</td>
											<td>{{$s->rataRata}}</td>
											<td>{{$s->kelas_id}}</td>
										</tr>
										@php
										$rangking++;
										@endphp
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						@stop
