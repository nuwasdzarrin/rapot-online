<?php use App\aktif; $periode  = aktif::where('status', 1) -> first(); use App\kkm; $kkm = kkm::where('id', 1) -> first(); ?>
    <style type="text/css" media="print">
    @page {
      size: auto;   /* auto is the initial value */
      margin: 25;  /* this affects the margin in the printer settings */
      }
    </style>

<body onload="">
    <div class="container">
        <table>
            <caption>
               <h2>HASIL BELAJAR</h2>
            </caption>
		</table>

<table class="table">



					<tbody>
					@foreach($siswa as $siswa)

					<tr>
	                  <td>Nama</td>
	                  <td>:</td>
	                  <td>{{$siswa->name}}</td>
	                 <td style="width: 150;float:right">
	                   <td>Kelas</td>
	                  <td>:</td>
	                  <td>{{$siswa->kelas_id}}</td>

	                </tr>


					 <tr>
	                  <td>NIS / NISN</td>
	                  <td>:</td>
	                  <td>{{$siswa->nis}}</td>
	                  <td style="width: 150;float:right">
	                   <td>Kelas</td>
	                  <td>:</td>
	                  <td>{{$siswa->kelas_id}}</td>
	                </tr>



					@endforeach
</table>

<br>
<b>A. Nilai Pengetahuan dan Ketrampilan</b>


<table class="table" border="1" style="border-collapse: collapse;" width="100%">


	<tr>

		<td rowspan="2" align="center">No</td>
		<td rowspan="2" align="center">Muatan Pelajaran</td>
		<td colspan="3" align="center">Pengetahuan</td>
		<td colspan="3" align="center">Keterampilan</td>
	</tr>
	<tr>
		<td align="center">Nilai</td>
		<td align="center">Predikat</td>
		<td align="center">Deskripsi</td>
		<td align="center">Nilai</td>
		<td align="center">Predikat</td>
		<td align="center">Deskripsi</td>
	</tr>
	@foreach($siswa->mapel as $i => $d)
	<?php $mapel = $d; ?>
	<tr>
		<td align="center">{{ ++$i }}</td>
		<td align="center">{{ $d->nama }}</td>
		<td align="center">
			<span id="mean{{$mapel->id}}"></span>

			<script>
				var xjml{{$mapel->id}} = {{$mapel->pivot->p_kd1+$mapel->pivot->p_kd2+$mapel->pivot->p_kd3+$mapel->pivot->p_kd4+$mapel->pivot->p_kd5+$mapel->pivot->p_kd6+$mapel->pivot->p_kd7+$mapel->pivot->p_kd8+$mapel->pivot->p_kd9+$mapel->pivot->p_kd10}}; // Hasil Jumlah Semua Mapel yg ada

				var xMean{{$mapel->id}} = (xjml{{$mapel->id}}  /
				(	<?php if ($mapel->pivot->p_kd1 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd2 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd3 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->p_kd4 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd5 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd6 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->p_kd7 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd8 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd9 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->p_kd10 != 0): ?>1<?php endif; ?> +
				 0));
						                			
      			document.getElementById("mean{{$mapel->id}}").innerHTML = xMean{{$mapel->id}};
           	</script>
		</td>

		<td align="center">
			<span id="predikatCC{{$mapel->id}}"></span>
			<script>
				var xjmlCC{{$mapel->id}} = {{$mapel->pivot->p_kd1+$mapel->pivot->p_kd2+$mapel->pivot->p_kd3+$mapel->pivot->p_kd4+$mapel->pivot->p_kd5+$mapel->pivot->p_kd6+$mapel->pivot->p_kd7+$mapel->pivot->p_kd8+$mapel->pivot->p_kd9+$mapel->pivot->p_kd10}}; // Hasil Jumlah Semua Mapel yg ada

				var xMeanCC{{$mapel->id}} = (xjmlCC{{$mapel->id}}  /
				(	<?php if ($mapel->pivot->p_kd1 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd2 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd3 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->p_kd4 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd5 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd6 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->p_kd7 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd8 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->p_kd9 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->p_kd10 != 0): ?>1<?php endif; ?> +
				 0));
						                			
      			// document.getElementById("predikatCC{{$mapel->id}}").innerHTML = xMeanCC{{$mapel->id}};

      			if (xMeanCC<?php echo $mapel->id ?> >= <?php echo $kkm->predA2 ?> && xMeanCC<?php echo $mapel->id ?> <= <?php echo $kkm->predA1 ?> ) {
				 	document.getElementById('predikatCC<?php echo $mapel->id ?>').innerHTML = "A";
				 }

				if (xMeanCC<?php echo $mapel->id ?> >= <?php echo $kkm->predB2 ?> && xMeanCC<?php echo $mapel->id ?> <= <?php echo $kkm->predB1 ?> ) 
				{
					document.getElementById('predikatCC<?php echo $mapel->id ?>').innerHTML = "B" ;
				}
				
				if (xMeanCC<?php echo $mapel->id ?> >= <?php echo $kkm->predC2?> && xMeanCC<?php echo $mapel->id ?> <= <?php echo $kkm->predC1 ?> ) 
				{
					document.getElementById('predikatCC<?php echo $mapel->id ?>').innerHTML = "C" ;
				}
				
				if (xMeanCC<?php echo $mapel->id ?> >= <?php echo $kkm->predD2 ?> && xMeanCC<?php echo $mapel->id ?> <= <?php echo $kkm->predD1 ?> ) 
				{
					document.getElementById('predikatCC<?php echo $mapel->id ?>').innerHTML = "D" ;
				}
           	</script>
		</td>

		<td align="center">{{ $d->getOriginal('pivot_p_deskripsi') }}</td>

		<td align="center">
			<span id="meannilaiKet{{$mapel->id}}"></span>

			<script type="text/javascript">
				var jmlnilaiKet{{$mapel->id}} = {{$mapel->pivot->k_kd1 + $mapel->pivot->k_kd2 + $mapel->pivot->k_kd3 + $mapel->pivot->k_kd4 + $mapel->pivot->k_kd5 + $mapel->pivot->k_kd6 + $mapel->pivot->k_kd7 + $mapel->pivot->k_kd8 + $mapel->pivot->k_kd9 + $mapel->pivot->k_kd10}};

				var xMeanket{{$mapel->id}} = jmlnilaiKet{{$mapel->id}}  /
				(	<?php if ($mapel->pivot->k_kd1 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->k_kd2 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->k_kd3 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->k_kd4 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->k_kd5 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->k_kd6 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->k_kd7 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->k_kd8 != 0): ?>1<?php endif; ?> + 
					<?php if ($mapel->pivot->k_kd9 != 0): ?>1<?php endif; ?> +
					<?php if ($mapel->pivot->k_kd10 != 0): ?>1<?php endif; ?> +
				 0);

				document.getElementById('meannilaiKet{{$mapel->id}}').innerHTML = xMeanket{{$mapel->id}};

			</script>
		</td>

		<td align="center">
				<?php if ($d->getOriginal('pivot_k_kd1') == 50 && $d->getOriginal('pivot_k_kd2') == 50 && $d->getOriginal('pivot_k_kd3') == 50 && $d->getOriginal('pivot_k_kd4') == 50 && $d->getOriginal('pivot_k_kd5') == 50): ?>
				{{ AppHelper::getPredikat(
					($d->getOriginal('pivot_k_kd1')/5 + 
					$d->getOriginal('pivot_k_kd2')/5 + 
					$d->getOriginal('pivot_k_kd3')/5 + 
					$d->getOriginal('pivot_k_kd4')/5 + 
					$d->getOriginal('pivot_k_kd5')/5)/2) 
				}}
				<?php else: ?>
				{{ AppHelper::getPredikat(
					$d->getOriginal('pivot_k_kd1')/5 + 
					$d->getOriginal('pivot_k_kd2')/5 + 
					$d->getOriginal('pivot_k_kd3')/5 + 
					$d->getOriginal('pivot_k_kd4')/5 + 
					$d->getOriginal('pivot_k_kd5')/5) 
				}}
				<?php endif ?>
		</td>
		<td align="center">{{ $d->getOriginal('pivot_k_deskripsi') }}</td>
	</tr>
	@endforeach
	<tr>
		<td></td>
		<td align="center">JUMLAH</td>
		<td align="center">{{ $total_pengetahuan}}</td>
		<td></td>
		<td align="center">JUMLAH</td>
		<td align="center">{{ $total_akademik }}</td>
		<td colspan="2"></td>
	</tr>

</table>
<br>
<b>B. Nilai Muatan Lokal</b>

<table class="table" border="1" style="border-collapse: collapse;" width="100%">


	<tr>

		<td rowspan="2" align="center">No</td>
		<td rowspan="2" align="center">Muatan Pelajaran</td>
		<td colspan="3" align="center">Pengetahuan</td>
		<td colspan="3" align="center">Keterampilan</td>
	</tr>
	<tr>
		<td align="center">Nilai</td>
		<td align="center">Predikat</td>
		<td align="center">Deskripsi</td>
		<td align="center">Nilai</td>
		<td align="center">Predikat</td>
		<td align="center">Deskripsi</td>
	</tr>

	@foreach($siswa->mulok as $mulok => $s)
	<?php $mulok = $s; ?>
	<tr>
		<td align="center">{{ ++$i }}</td>
		<td align="center">{{ $s->nama }}</td>
		<td align="center">
			<span id="akhirMulok{{$mulok->id}}"></span>
			<script type="text/javascript">
       		var total{{$mulok->id}} = {{ $mulok->pivot->p_kd1 + $mulok->pivot->p_kd2 + $mulok->pivot->p_kd3 + $mulok->pivot->p_kd4 }};

       		var bagi{{$mulok->id}} = <?php if ($mulok->pivot->p_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd4 != '') {echo 1;} ?> + 0;

			document.getElementById('akhirMulok{{$mulok->id}}').innerHTML = total{{$mulok->id}} / bagi{{$mulok->id}};
       	</script>
		</td>

		<td align="center">
			<span id="hasilPPredPengetahuanHQ<?php echo $mulok->id ?>"></span>
			<script type="text/javascript">
       			var totalKHD{{$mulok->id}} = {{ $mulok->pivot->p_kd1 + $mulok->pivot->p_kd2 + $mulok->pivot->p_kd3 + $mulok->pivot->p_kd4 }};

       			var bagiKHD{{$mulok->id}} = <?php if ($mulok->pivot->p_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd4 != '') {echo 1;} ?> + 0;

       			var totalKHU{{$mulok->id}} = (totalKHD{{$mulok->id}} / bagiKHD{{$mulok->id}});

       			if (totalKHU<?php echo $mulok->id ?> >= <?php echo $kkm->predA2 ?> && totalKHU<?php echo $mulok->id ?> <= <?php echo $kkm->predA1 ?> ) {
				 	document.getElementById('hasilPPredPengetahuanHQ<?php echo $mulok->id ?>').innerHTML = "A";
				 }

				if (totalKHU<?php echo $mulok->id ?> >= <?php echo $kkm->predB2 ?> && totalKHU<?php echo $mulok->id ?> <= <?php echo $kkm->predB1 ?> ) 
				{
					document.getElementById('hasilPPredPengetahuanHQ<?php echo $mulok->id ?>').innerHTML = "B" ;
				}
				
				if (totalKHU<?php echo $mulok->id ?> >= <?php echo $kkm->predC2?> && totalKHU<?php echo $mulok->id ?> <= <?php echo $kkm->predC1 ?> ) 
				{
					document.getElementById('hasilPPredPengetahuanHQ<?php echo $mulok->id ?>').innerHTML = "C" ;
				}
				
				if (totalKHU<?php echo $mulok->id ?> >= <?php echo $kkm->predD2 ?> && totalKHU<?php echo $mulok->id ?> <= <?php echo $kkm->predD1 ?> ) 
				{
					document.getElementById('hasilPPredPengetahuanHQ<?php echo $mulok->id ?>').innerHTML = "D" ;
				}
       		</script>
		</td>

		<td align="center">{{ $d->getOriginal('pivot_p_deskripsi') }}</td>

		<td align="center">
			<span id="akhirsMulok{{$mulok->id}}"></span>
			<script type="text/javascript">
       		var total{{$mulok->id}} = {{ $mulok->pivot->k_kd1 + $mulok->pivot->k_kd2 + $mulok->pivot->k_kd3 + $mulok->pivot->k_kd4 }};

       		var bagi{{$mulok->id}} = <?php if ($mulok->pivot->k_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd4 != '') {echo 1;} ?> + 0;

       		document.getElementById("akhirsMulok{{$mulok->id}}").innerHTML = total{{$mulok->id}} / bagi{{$mulok->id}};
       	</script>
		</td>

		<td align="center">
			<span id="hasilPPredKet<?php echo $mulok->id ?>"></span>
			<script type="text/javascript">
       		var totalKC{{$mulok->id}} = {{ $mulok->pivot->k_kd1 + $mulok->pivot->k_kd2 + $mulok->pivot->k_kd3 + $mulok->pivot->k_kd4 }};

       		var bagiKC{{$mulok->id}} = <?php if ($mulok->pivot->k_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd4 != '') {echo 1;} ?> + 0;

       		var akhirKC{{$mulok->id}} = (totalKC{{$mulok->id}} / bagiKC{{$mulok->id}});

       		if (akhirKC<?php echo $mulok->id ?> >= <?php echo $kkm->predA2 ?> && akhirKC<?php echo $mulok->id ?> <= <?php echo $kkm->predA1 ?> ) {
				document.getElementById('hasilPPredKet<?php echo $mulok->id ?>').innerHTML = "A";
			}

			if (akhirKC<?php echo $mulok->id ?> >= <?php echo $kkm->predB2 ?> && akhirKC<?php echo $mulok->id ?> <= <?php echo $kkm->predB1 ?> ) 
			{
				document.getElementById('hasilPPredKet<?php echo $mulok->id ?>').innerHTML = "B" ;
			}
			
			if (akhirKC<?php echo $mulok->id ?> >= <?php echo $kkm->predC2?> && akhirKC<?php echo $mulok->id ?> <= <?php echo $kkm->predC1 ?> ) 
			{
				document.getElementById('hasilPPredKet<?php echo $mulok->id ?>').innerHTML = "C" ;
			}
			
			if (akhirKC<?php echo $mulok->id ?> >= <?php echo $kkm->predD2 ?> && akhirKC<?php echo $mulok->id ?> <= <?php echo $kkm->predD1 ?> ) 
			{
				document.getElementById('hasilPPredKet<?php echo $mulok->id ?>').innerHTML = "D" ;
			}
       		
       	</script>
		</td>

		<td align="center">{{ $d->getOriginal('pivot_k_deskripsi') }}</td>
	</tr>
	@endforeach
</table>


<br>
	<b>C. Kokulikuler dan Ekstrakulikuler</b>

<table class="table" border="1" style="border-collapse: collapse;" width="100%">
	<tr>
		<td colspan="1" align="center">No</td>
		<td colspan="1" align="center">Kegiatan KO dan Ekstrakulikuler</td>
		<td colspan="1" align="center">Semester</td>
		<td colspan="1" align="center">Deskripsi</td>
	</tr>

	@foreach($siswa->ekstra as $i => $e)
     <tr>
   		<td align="center">{{ ++$i }}</td>
   		<td align="center">{{ $e->nama }} {{ $e->ekstra_id }} </td>
   		<td align="center">{{ $e->semester }}</td>
   		<td align="center">{{ $e->getOriginal('pivot_deskripsi') }}</td>
   	</tr>
	@endforeach
</table>
<br>
	<b>D. Saran

<table class="table" border="1" style="border-collapse: collapse;" width="100%">
	<tr>
		<td colspan="1" align="center">No</td>
		<td colspan="1" align="center">Saran</td>
		<td colspan="1" align="center">Semester</td>
	</tr>

	@foreach($saran as $i => $e)
	<tr>
		<td align="center">{{ ++$i }}</td>
		<td align="center">{{ $e->deskripsi }}</td>
		<td align="center">{{ ucfirst($e->saran->semester) }}</td>
	</tr>
	@endforeach
</table>
<br>
<b>E.Kehadiran

<table class="table" border="1" style="border-collapse: collapse;" width="100%">
	<tr>
		<td colspan="1" align="center">No</td>
		<td colspan="1" align="center">Keterangan</td>
		<td colspan="1" align="center">Jumlah</td>
	</tr>

	<tr>
		<td align="center">1</td>
		<td align="center">Alpa</td>
		<td align="center">{{ $alpa }}</td>
	</tr>
	<tr>
		<td align="center">2</td>
		<td align="center">Izin</td>
		<td align="center">{{ $izin }}</td>
	</tr>
	<tr>
		<td align="center">3</td>
		<td align="center">Sakit</td>
		<td align="center">{{ $sakit }}</td>
	</tr>
</table>
<br/>
<br/>

<div>
	<div style="width: 230;float:right">
<?php
echo "Pasuruan, " . date("d M Y");
?>
		<br/>Mengetahui,
		<br/>Kepala Sekolah<br/><br/><br/>
		<p>Supeno<br/>NIP. 196306621 198504 1 001</p>
	</div>
	<div style="width: 200;float:left;">

		<br/>Orang Tua / Wali<br/><br/><br/><br>
		<table class="table" style="width: 100%">
                <tr>
                  <td>(</td>
                  <td></td>
                  <td>)</td>

                </tr>
	</div>
</div>
