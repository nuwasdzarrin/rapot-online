@extends('layout.master')

@section ('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">

			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{session('sukses')}}
			</div>
			@endif

			<div class="row">
				<div class="col-md-12">
	<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number"></span>
											<span class="title">Data Siswa</span>
											<br>
											 <a href="/siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</p>

									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"></span>
											<span class="title">Data Guru</span>
											<br>
											 <a href="/guru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</p>
									</div>

								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-star"></i></span>
										<p>
											<span class="number"></span>
											<span class="title">Rangking</span>
											<br>
											 <a href="/rangking" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-book"></i></span>
										<p>
											<span class="number"></span>
											<span class="title">Kehadiran</span>
											<br>
											 <a href="/kehadiran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</p>
									</div>
								</div>
							</div>
@stop
