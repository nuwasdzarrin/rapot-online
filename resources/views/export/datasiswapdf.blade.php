<body>
    <div class="container">

       <h4><center><font size="4" face="arial">IDENTITAS PESERTA DIDIK</font></center></h4>
       <center><b><font size="4" face="Courier New">SEKOLAH DASAR NEGERI PAGAK</font></b></center><br>
       <center><b>Jl. Kelurahan Pagak No.39 Kecamatan Beji Kabupaten Pasuruan - 67154 </b></center><br>
       <hr><width='100' height="75"></hr>
       <br>
<table style="width: 100%" class="table ">
					<tbody>
					@foreach($siswa as $siswa)
					<td>
					  <h4>
              <table class="table" style="width: 100%">
                <tr>
                  <td>Nama Sekolah</td>
                  <td>:</td>
                  <td>Sekolah Dasar Negeri Pagak</td>
                </tr>

                <tr>
                  <td>NPSN</td>
                  <td>:</td>
                  <td>20519623</td>
                </tr>

                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td>{{$siswa->name}}</td>
                </tr>

                <tr>
                  <td>Kelas</td>
                  <td>:</td>
                  <td>{{$siswa->kelas_id}}</td>
                </tr>

                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>{{$siswa->jenis_kelamin}}</td>
                </tr>

                <tr>
                  <td>Tempat Lahir</td>
                  <td>:</td>
                  <td>{{$siswa->tempat_lahir}}</td>
                </tr>

                <tr>
                  <td>Tanggal Lahir</td>
                  <td>:</td>
                  <td>{{$siswa->tgl_lahir}}</td>
                </tr>

                <tr>
                  <td>NIS</td>
                  <td>:</td>
                  <td>{{$siswa->nis}}</td>
                </tr>

                <tr>
                  <td>Agama</td>
                  <td>:</td>
                  <td>{{$siswa->agama}}</td>
                </tr>

                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td>{{$siswa->alamat}}</td>
                </tr>
              </table>
            </h4>
					</td>

					@endforeach
</table>
<br/>
<br/>
<br/>

<div>
	<div style="width: 150;float:left;">
		<div style="background-color: #;
		border: 1px solid #17202A;
		height: 99px;
		margin: 10 px 50 px;
		padding: 5 px;
		text-align: center;
		width: 99px;"> Foto 3x4
	</div>
</div>



<div>
	<div style="width: 150;float:right">
<?php
echo "Pasuruan, " . date("d M Y");
?>
		<br/>Kepala Sekolah, <br/><br/><br/>
		<p>Supeno<br/>NIP.</p>
	</div>
</div>
