<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        @if(auth()->user()->role == 'admin')
        <li><a href="/operator" class=""><i class="lnr lnr-user"></i> <span>Admin</span></a></li>
        <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
        <li><a href="/guru" class=""><i class="lnr lnr-users"></i> <span>Guru</span></a></li>
        @endif
        @if(auth()->user()->role == 'guru')
        <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
        <li><a href="/guru" class=""><i class="lnr lnr-users"></i> <span>Guru</span></a></li>
        @endif
        @if(auth()->user()->role == 'siswa')
        <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
        <li><a href="/guru" class=""><i class="lnr lnr-users"></i> <span>Guru</span></a></li>
        @endif
        <li>
          <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Kelas</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
          <div id="subPages" class="collapse ">
            <ul class="nav">
              <li><a href="/kelas_1" class="">Kelas 1</a></li>
              <li><a href="/kelas_2" class="">Kelas 2</a></li>
              <li><a href="/kelas_3" class="">Kelas 3</a></li>
              <li><a href="/kelas_4" class="">Kelas 4</a></li>
              <li><a href="/kelas_5" class="">Kelas 5</a></li>
              <li><a href="/kelas_6" class="">Kelas 6</a></li>
            </ul>
          </div>
        </li>

        <li>
        <li><a href="/rangking" class=""><i class="lnr lnr-star"></i> <span>Rangking</span></a></li>
        <li><a href="/kehadiran" class=""><i class="lnr lnr-book"></i> <span>Kehadiran</span></a></li>
       
        <li>
          <a href="#" data-toggle="collapse" class="collapsed" data-target="#demo"><i class="lnr lnr-cog"></i> <span> Setting</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        </li>

        <div id="demo" class="collapse">
          <ul class="nav">
            @if(auth()->user()->role == 'admin')
            <li><a href="/aktif" class=""><i class="lnr lnr-cog"></i> <span> Setting Aktif</span></a></li>
            @endif
            <li><a data-toggle="modal" data-target="#ModalKKMNilai" href="#kkm" class=""><i class="lnr lnr-cog"></i> <span> Setting KKM</span></a></li>
            <li><a href="/ekstrakurikuler" class=""><i class="lnr lnr-cog"></i> <span> Setting Ekstra</span></a></li>
          </ul>
        </div>

        </li>
      </ul>
    </nav>
  </div>
</div>
