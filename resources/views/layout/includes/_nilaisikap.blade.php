<?php use App\aktif; $periode  = aktif::where('status', 1) -> first(); ?>


@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSikap">
  Tambah Nilai Sikap
</button>


@endif

<div class="panel-heading">
  <h3 class="panel-title">Nilai Sikap</h3>
</div>
<div class=" table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
      <th>Nilai</th>
      <th>Keterangan</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
    
    </thead>
    <tbody>
      @foreach($siswa->sikap as $sikap)
      <tr>

        <td>{{$sikap->nilai}}</td>
        <td>{{$sikap->keterangan}}</td>
        <td>{{$sikap->pivot->deskripsi}}</td>
 
       
         &nbsp
          <td><a href="/siswa/{{$siswa->id}}/{{$sikap->id}}/deletesikap" class="lnr lnr-trash" onclick="return confirm('Yakin Hapus ??')"></a></td>
      </tr>
      @endforeach

  </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalSikap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nilai Sikap</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/siswa/{{$siswa->id}}/addsikap" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="form-group">
        <label for="sikap">Nilai Sikap</label>
        <select class="form-control" id="sikap" name="sikap">
          @foreach($nilaisikap as $s)
          <option value="{{$s->id}}">{{$s->nilai}}</option>
          @endforeach
        </select>
         <label for="sikap">Keterangan</label>
        <select class="form-control" id="sikap" name="sikap">
          @foreach($nilaisikap as $s)
          <option value="{{$s->id}}">{{$s->keterangan}}</option>
          @endforeach
        </select>
        
        <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}"">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('deskripsi')}}</textarea>
             @if($errors->has('p_deskripsi'))
             <span class="help-block">{{$errors->first('deskripsi')}}</span>
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
