@extends('layout.frontend')

@section('content')
<section class="banner-area relative" id="home" style="background: url('/images/p.jpg');">
					
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Pendaftaran 		
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/register"> Pendaftaran</a></p>
						</div>	
					</div>
				</div>
			
				</div>
				</div>					
			</section>
<section class="search-course-area relative" style="background: unset;">
				
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-3 col-md-6 search-course-left">
							<h1 >
								Pendaftaran Online <br>
								Siswa Baru
							</h1>
							<p>
								Pendaftaran siswa baru digunakan untuk mendaftarkan siswa untuk bisa login atau memiliki hak akses ke raport online.
							</p>
							
						</div>
						<div class="col-lg-49 col-md-6 search-course-right section-gap">

							{!! Form::open(['url' => '/postregister','class'=> 'form-wrap']) !!}
							<h4 class=" pb-20 text-center mb-30">Formulir Pendaftaran</h4>	
						{!!Form::text('name','',['class'=>'form-control','placeholder'=>'Nama Lengkap'])!!}	
						<div class="form-select" id="service-select">	
						{!!Form::select('jenis_kelamin', [''=>'Pilih Jenis Kelamin','L' => 'Laki-Laki', 'P' => 'Perempuan'],['class'=>'form-select'],['style'=>'display:none;']);!!}	
						</div>
						{!!Form::text('tempat_lahir','',['class'=>'form-control','placeholder'=>'Tempat Lahir'])!!}	
						{!!Form::text('tgl_lahir','',['class'=>'form-control','placeholder'=>'Tanggal Lahir'])!!}
						{!!Form::text('nis','',['class'=>'form-control','placeholder'=>'NISN'])!!}	
						{!!Form::text('agama','',['class'=>'form-control','placeholder'=>'Agama'])!!}	
						{!!Form::textarea('alamat','',['class'=>'form-control','placeholder'=>'Alamat Lengkap'])!!}	
						{!!Form::text('tahun_angkatan','',['class'=>'form-control','placeholder'=>'Tahun'])!!}
						{!!Form::password('password',['class'=>'form-control','placeholder'=>'Password'])!!}	
						<div class="form-select" id="service-select">	
							<p>Kelas</p>
						{!!Form::selectRange('kelas_id', 1, 6);!!}	
						</div>
												
						<button class="primary-btn text-uppercase">Daftar</button>
						{!! Form::close() !!}
						</div>
					</div>
				</div>	
			</section>
@stop