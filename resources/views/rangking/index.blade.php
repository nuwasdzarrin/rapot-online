@extends('layout.master')

@section ('content')
<?php
use App\Siswa;

$siswaKLS1 = Siswa::where('kelas_id', '=' , 1) -> get();
$siswaKLS1->map(function($s){$s->rataRata = $s->rataRata();return $s;});
$siswaKLS1 = $siswaKLS1->sortByDesc('rataRata');

$siswaKLS2 = Siswa::where('kelas_id', '=' , 2) -> get();
$siswaKLS2->map(function($s){$s->rataRata = $s->rataRata();return $s;});
$siswaKLS2 = $siswaKLS2->sortByDesc('rataRata');

$siswaKLS3 = Siswa::where('kelas_id', '=' , 3) -> get();
$siswaKLS3->map(function($s){$s->rataRata = $s->rataRata();return $s;});
$siswaKLS3 = $siswaKLS3->sortByDesc('rataRata');

$siswaKLS4 = Siswa::where('kelas_id', '=' , 4) -> get();
$siswaKLS4->map(function($s){$s->rataRata = $s->rataRata();return $s;});
$siswaKLS4 = $siswaKLS4->sortByDesc('rataRata');

$siswaKLS5 = Siswa::where('kelas_id', '=' , 5) -> get();
$siswaKLS5->map(function($s){$s->rataRata = $s->rataRata();return $s;});
$siswaKLS5 = $siswaKLS5->sortByDesc('rataRata');

$siswaKLS6 = Siswa::where('kelas_id', '=' , 6) -> get();
$siswaKLS6->map(function($s){$s->rataRata = $s->rataRata();return $s;});
$siswaKLS6 = $siswaKLS6->sortByDesc('rataRata');
 ?>


<style media="screen">

    @media (min-width:992px) {
        .hide-lg {
            display: none !important;
        }

        .sticky-top {
          position: -webkit-sticky; /* Safari */
          position: sticky;
          top: 0;
        }
    }

    @media (min-width: 768px) and (max-width: 992px) {
        .hide-md {
            display: none !important
        }

        .sticky-top {
          position: -webkit-sticky; /* Safari */
          position: sticky;
          top: 0;
        }

    }

    @media (max-width: 576px) {
        .hide-sm {
            display: none !important;
        }
    }
</style>

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12 sticky-top">
					<h4>Pilih Kelas</h4>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Kelas</th>
							</tr>
						</thead>
						<tbody>
							@for($i=1; $i<7; $i++) <tr>
								<td><a data-toggle="collapse" data-target="#rangkingkelas{{$i}}" href="#">Kelas {{ $i }}</a></td>
								</tr>
								@endfor
						</tbody>
					</table>
				</div>

				<div class="col-md-10 col-xs-12 col-sm-10 col-lg-10">

					<!-- Kelas 1 -->
					<div id="rangkingkelas1" style="margin-bottom: 12px" class="collapse">
						<h4>Rangking Kelas 1</h4>
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
								@foreach($siswaKLS1 as $s)
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

					<!-- Kelas 2 -->
					<div id="rangkingkelas2" style="margin-bottom: 12px" class="collapse">
						<h4>Rangking Kelas 2</h4>
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
								@foreach($siswaKLS2 as $s)
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

					<!-- Kelas 3 -->

					<div id="rangkingkelas3" style="margin-bottom: 12px" class="collapse">
						<h4>Rangking Kelas 3</h4>
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
								@foreach($siswaKLS3 as $s)
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

					<!-- Kelas 4 -->

					<div id="rangkingkelas4" style="margin-bottom: 12px" class="collapse">
						<h4>Rangking Kelas 4</h4>
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
								@foreach($siswaKLS4 as $s)
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

					<!-- Kelas 5 -->

					<div id="rangkingkelas5" style="margin-bottom: 12px" class="collapse">
					  <h4>Rangking Kelas 5</h4>
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
					      @foreach($siswaKLS5 as $s)
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

					<!-- Kelas 6 -->

					<div id="rangkingkelas6" style="margin-bottom: 12px" class="collapse">
					  <h4>Rangking Kelas 6</h4>
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
					      @foreach($siswaKLS6 as $s)
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
			</div>
		</div>
	</div>
</div>
@stop
