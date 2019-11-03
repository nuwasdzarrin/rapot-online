@extends('layout.master')

@section ('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$guru->getProfile()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$guru->nama_guru}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Projects</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>NIP <span>{{$guru->nip_guru}}</span></li>
											<li>Alamat<span>{{$guru->alamat}}</span></li>
											<li>Jenis Kelamin <span>{{$guru->jenis_kelamin_guru}}</span></li>
											<li>No.Telp <span>{{$guru->no_tlp_guru}}</span></li>
											<li>Jabatan<span>{{$guru->jabatan_guru}}</span></li>
											
										</ul>
									</div>
									<div class="text-center"><a href="/guru/{{$guru->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
	
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@stop