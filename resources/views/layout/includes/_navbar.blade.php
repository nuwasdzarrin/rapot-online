 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="/dashboard"><img src="{{asset('admin/assets/img/logo.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left" method="GET" action="/siswa">
          <div class="input-group">
            <input name="cari" type="text" value="" class="form-control" placeholder="Search Data Siswa">
            <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
          </div>
        </form>  
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
               <li><a href="/password"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                 @if(auth()->user()->role == 'admin')
                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                  @endif
                 @if(auth()->user()->role == 'siswa')
                 <li><a href="/logoutsiswa"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                   @endif
                    @if(auth()->user()->role == 'guru')
                 <li><a href="/logoutguru"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                   @endif
              </ul>
            </li>
            <!-- <li>
              <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>