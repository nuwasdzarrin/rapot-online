<?php use App\aktif; $periode  = aktif::where('status', 1) -> first(); ?>


@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalMulok">
  Tambah Nilai Mulok
</button>


@endif

<div class="panel-heading">
  <h3 class="panel-title">Mulok</h3>
</div>
<div class=" table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
      	<td rowspan="2" align="center">Muatan Lokal</td>
		<td rowspan="2" align="center">Semester</td>
		<td rowspan="2" align="center">Periode</td>
		<td colspan="8" align="center">Pengetahuan</td>
		<td colspan="8" align="center">Keterampilan</td>
      </tr>
      <tr>
		<td  align="center">KD 3.1</td>
		<td  align="center">KD 3.2</td>
		<td  align="center">KD 3.3</td>
		<td  align="center">KD 3.4</td>
		<td  align="center">NIlai Akhir</td>
		<td  align="center">Predikat</td>
		<td  align="center">Deskripsi</td>
		<td  align="center">KD 4.1</td>
		<td  align="center">KD 4.2</td>
		<td  align="center">KD 4.3</td>
		<td  align="center">KD 4.4</td>
		<td  align="center">NIlai Akhir</td>
		<td  align="center">Predikat</td>
		<td  align="center">Deskripsi</td>
		<td  align="center">Aksi</td>
    </thead>
    <tbody>
      @foreach($siswa->mulok as $mulok)
      <tr>

        <td>{{$mulok->nama}}</td>
        <td>{{$periode->semester}}</td>
        <td> {{$periode -> periode}} </td>
 
        <td><a  class="p_kd1" data-type="text" data-nilai="p_kd1" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai " type="number" data-title="Input Nilai">{{$mulok->pivot->p_kd1}}</a></td>

		<td><a class="p_kd2" data-type="text" data-nilai="p_kd2" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->p_kd2}}</a></td>

		<td><a  class="p_kd3" data-type="text" data-nilai="p_kd3" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->p_kd3}}</a></td>

		<td><a  class="p_kd4" data-type="text" data-nilai="p_kd4" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->p_kd4}}</a></td>
       
       <td><a  class="nilai akhir" id="akhirMulok{{$mulok->id}}" data-type="text" data-nilai="nilai akhir" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai"></a>
       	<script type="text/javascript">
       		var total{{$mulok->id}} = {{ $mulok->pivot->p_kd1 + $mulok->pivot->p_kd2 + $mulok->pivot->p_kd3 + $mulok->pivot->p_kd4 }};

       		var bagi{{$mulok->id}} = <?php if ($mulok->pivot->p_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd4 != '') {echo 1;} ?> + 0;

			document.getElementById('akhirMulok{{$mulok->id}}').innerHTML = total{{$mulok->id}} / bagi{{$mulok->id}};
       	</script>
       </td>

       <td><a  class="p_predikat" data-nilai="_p_predikat" data-type="text" data-pk="{{$mulok->id}}" id="hasilPPredPengetahuanH{{$mulok->id}}" data-title="Input Nilai"></a>
       		<script type="text/javascript">
       			var totalKH{{$mulok->id}} = {{ $mulok->pivot->p_kd1 + $mulok->pivot->p_kd2 + $mulok->pivot->p_kd3 + $mulok->pivot->p_kd4 }};

       			var bagiKH{{$mulok->id}} = <?php if ($mulok->pivot->p_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->p_kd4 != '') {echo 1;} ?> + 0;

       			var totalKH{{$mulok->id}} = (totalKH{{$mulok->id}} / bagiKH{{$mulok->id}});

       			if (totalKH<?php echo $mulok->id ?> >= <?php echo $kkm->predA2 ?> && totalKH<?php echo $mulok->id ?> <= <?php echo $kkm->predA1 ?> ) {
				 	document.getElementById('hasilPPredPengetahuanH<?php echo $mulok->id ?>').innerHTML = "A";
				 }

				if (totalKH<?php echo $mulok->id ?> >= <?php echo $kkm->predB2 ?> && totalKH<?php echo $mulok->id ?> <= <?php echo $kkm->predB1 ?> ) 
				{
					document.getElementById('hasilPPredPengetahuanH<?php echo $mulok->id ?>').innerHTML = "B" ;
				}
				
				if (totalKH<?php echo $mulok->id ?> >= <?php echo $kkm->predC2?> && totalKH<?php echo $mulok->id ?> <= <?php echo $kkm->predC1 ?> ) 
				{
					document.getElementById('hasilPPredPengetahuanH<?php echo $mulok->id ?>').innerHTML = "C" ;
				}
				
				if (totalKH<?php echo $mulok->id ?> >= <?php echo $kkm->predD2 ?> && totalKH<?php echo $mulok->id ?> <= <?php echo $kkm->predD1 ?> ) 
				{
					document.getElementById('hasilPPredPengetahuanH<?php echo $mulok->id ?>').innerHTML = "D" ;
				}
       		</script>
		</td>

		<td><a  class="p_deskripsi" data-nilai="p_deskripsi" data-type="text" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->p_deskripsi}}</a></td>

		 <td><a  class="k_kd1" data-type="text" data-nilai="k_kd1" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai " type="number" data-title="Input Nilai">{{$mulok->pivot->k_kd1}}</a></td>

		<td><a class="k_kd2" data-type="text" data-nilai="k_kd2" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->k_kd2}}</a></td>

		<td><a  class="k_kd3" data-type="text" data-nilai="k_kd3" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->k_kd3}}</a></td>

		<td><a  class="k_kd4" data-type="text" data-nilai="k_kd4" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->k_kd4}}</a></td>
       
       <td><a  class="nilai akhir" data-type="text" id="akhirsMulok{{$mulok->id}}" data-nilai="nilai akhir" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai"></a></td>

       <script type="text/javascript">
       		var total{{$mulok->id}} = {{ $mulok->pivot->k_kd1 + $mulok->pivot->k_kd2 + $mulok->pivot->k_kd3 + $mulok->pivot->k_kd4 }};

       		var bagi{{$mulok->id}} = <?php if ($mulok->pivot->k_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd4 != '') {echo 1;} ?> + 0;

       		document.getElementById("akhirsMulok{{$mulok->id}}").innerHTML = total{{$mulok->id}} / bagi{{$mulok->id}};
       	</script>

       <td><a  class="k_predikat" id="hasilKeterampilanS<?php echo $mulok->id ?>" data-nilai="k_predikat" data-type="text" data-pk="{{$mulok->id}}"  data-title="Input Nilai"></a>

		<script type="text/javascript">
			var PengetTotalS{{$mulok->id}} = {{ $mulok->pivot->k_kd1 + $mulok->pivot->k_kd2 + $mulok->pivot->k_kd3 + $mulok->pivot->k_kd4 }};
			var predKetS{{$mulok->id}} = (PengetTotalS{{$mulok->id}} / <?php if ($mulok->pivot->k_kd1 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd2 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd3 != '') {echo 1;} ?> + <?php if ($mulok->pivot->k_kd4 != '') {echo 1;} ?> + 0);
			
			//document.getElementById('hasilPPredPengetahuan<?php echo $mulok->id ?>').innerHTML = "A";

			if (predKetS<?php echo $mulok->id ?> >= <?php echo $kkm->predA2 ?> && predKetS<?php echo $mulok->id ?> <= <?php echo $kkm->predA1 ?> ) {
				document.getElementById('hasilKeterampilanS<?php echo $mulok->id ?>').innerHTML = "A";
			}

			if (predKetS<?php echo $mulok->id ?> >= <?php echo $kkm->predB2 ?> && predKetS<?php echo $mulok->id ?> <= <?php echo $kkm->predB1 ?> ) 
			{
				document.getElementById('hasilKeterampilanS<?php echo $mulok->id ?>').innerHTML = "B" ;
			}
			
			if (predKetS<?php echo $mulok->id ?> >= <?php echo $kkm->predC2?> && predKetS<?php echo $mulok->id ?> <= <?php echo $kkm->predC1 ?> ) 
			{
				document.getElementById('hasilKeterampilanS<?php echo $mulok->id ?>').innerHTML = "C" ;
			}
			
			if (predKetS<?php echo $mulok->id ?> >= <?php echo $kkm->predD2 ?> && predKetS<?php echo $mulok->id ?> <= <?php echo $kkm->predD1 ?> ) 
			{
				document.getElementById('hasilKeterampilanS<?php echo $mulok->id ?>').innerHTML = "D" ;
			}

		</script>       	
       </td>

		<td><a  class="k_deskripsi" data-nilai="k_deskripsi" data-type="text" data-pk="{{$mulok->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Input Nilai">{{$mulok->pivot->k_deskripsi}}</a></td>

         
        </td>
         &nbsp
          <td><a href="/siswa/{{$siswa->id}}/{{$mulok->id}}/deletemulok" class="lnr lnr-trash" onclick="return confirm('Yakin Hapus ??')"></a></td>
      </tr>
      @endforeach

  </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalMulok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nilai Mulok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<form action="/siswa/{{$siswa->id}}/addmulok" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="form-group">
				<label for="mulok">Muatan Lokal</label>
				<select class="form-control" id="mulok" name="mulok">
					@foreach($muatanlokal as $m)
					<option value="{{$m->id}}">{{$m->nama}}</option>
					@endforeach
				</select>
				
				<!--div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}"">
				<input name="nama"  type="text" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Muatan Lokal" >
				@if($errors->has('nama'))
				<span class="help-block">{{$errors->first('nama')}}</span>
				 @endif
				 </div-->

				<h4> Nilai Pengetahuan</h4>
				<div class="form-group{{$errors->has('p_kd1') ? ' has-error' : ''}}"">

				<label for="exampleInputEmail1">KD 3.1</label>
				<input name="p_kd1" onkeypress="return hanyaAngka(event);" type="text" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Nilai KD 1" value="0">
				@if($errors->has('p_kd1'))
				<span class="help-block">{{$errors->first('p_kd1')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('p_kd2') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.2</label>
				<input name="p_kd2" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 2" value="0">
				@if($errors->has('p_kd2'))
				<span class="help-block">{{$errors->first('p_kd2')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('p_kd3') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.3</label>
				<input name="p_kd3" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 3" value="0">
				@if($errors->has('p_kd3'))
				<span class="help-block">{{$errors->first('p_kd3')}}</span>
				 @endif
				 </div>

				  <div class="form-group{{$errors->has('p_kd4') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 3.4</label>
				<input name="p_kd4" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 4" value="0">
				@if($errors->has('p_kd4'))
				<span class="help-block">{{$errors->first('p_kd4')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('p_deskripsi') ? ' has-error' : ''}}"">
				    <label for="exampleFormControlTextarea1">Deskripsi</label>
				    <textarea name="p_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('p_deskripsi')}}</textarea>
				     @if($errors->has('p_deskripsi'))
					   <span class="help-block">{{$errors->first('p_deskripsi')}}</span>
					   @endif
				  </div>


				  <h4> Nilai Keterampilan</h4>
				<div class="form-group{{$errors->has('k_kd1') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Nilai KD 4.1</label>
				<input name="k_kd1" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 1" value="0">
				@if($errors->has('k_kd1'))
				<span class="help-block">{{$errors->first('k_kd1')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('k_kd2') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">Nilai KD 4.2</label>
				<input name="k_kd2" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 2" value="0">
				@if($errors->has('k_kd2'))
				<span class="help-block">{{$errors->first('k_kd2')}}</span>
				 @endif
				 </div>

				<div class="form-group{{$errors->has('k_kd3') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.3</label>
				<input name="k_kd3" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 3" value="0">
				@if($errors->has('k_kd3'))
				<span class="help-block">{{$errors->first('k_kd3')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_kd4') ? ' has-error' : ''}}"">
				<label for="exampleInputEmail1">KD 4.4</label>
				<input name="k_kd4" onkeypress="return hanyaAngka(event);" type="nilai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai KD 4" value="0">
				@if($errors->has('k_kd4'))
				<span class="help-block">{{$errors->first('k_kd4')}}</span>
				 @endif
				 </div>

				 <div class="form-group{{$errors->has('k_deskripsi') ? ' has-error' : ''}}"">
				 <label for="exampleFormControlTextarea1">Deskripsi</label>
				 <textarea name="k_deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('k_deskripsi')}}</textarea>
				  @if($errors->has('k_deskripsi'))
				<span class="help-block">{{$errors->first('k_deskripsi')}}</span>
					@endif
				  </div>
				  <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </form>

</div>
        </div>
      </div>

    </div>
  </div>
</div>
