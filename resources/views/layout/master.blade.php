<?php use App\kkm; $dataKKM = kkm::where('id', 1) -> first(); ?>
<!doctype html>
<html lang="en">

<head>
  <title>Raport Online</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/icon.png')}}">
  @yield('header')
</head>

<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <!-- NAVBAR -->
    @include('layout.includes._navbar')
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <style media="screen">
      .slimScrollDiv, .sidebar-scroll {
        height: 100% !important;
        overflow-x: scroll;
        overflow-y: hidden;
      }
    </style>
    @include('layout.includes._sidebar')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <!-- Modal -->
    <div id="ModalKKMNilai" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form class="" action="/kkm-update/{{$dataKKM->id}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ubah KKM</h4>
            </div>
            <div class="modal-body">
              <!-- predA -->
              <small>Predikat A adalah nilai</small>
              <div class="row">
                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predA1" class="form-control" placeholder="Predikat A Pertama" required value="{{$dataKKM->predA1}}">
                </div>

                <div class="col-lg-2 text-center col-sm-2 col-md-2 col-xs-2">
                  <small>Sampai</small>
                </div>

                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predA2" class="form-control" placeholder="Predikat A Kedua" required value="{{$dataKKM->predA2}}">
                </div>
              </div>
              <br>
              <!-- predB -->
              <small>Predikat B adalah nilai</small>
              <div class="row">
                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predB1" class="form-control" placeholder="Predikat B Pertama" required value="{{$dataKKM->predB1}}">
                </div>

                <div class="col-lg-2 text-center col-sm-2 col-md-2 col-xs-2">
                  <small>Sampai</small>
                </div>

                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predB2" class="form-control" placeholder="Predikat B Kedua" required value="{{$dataKKM->predB2}}">
                </div>
              </div>
              <br>
              <!-- predC -->
              <small>Predikat C adalah nilai</small>
              <div class="row">
                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predC1" class="form-control" placeholder="Predikat C Pertama" required value="{{$dataKKM->predC1}}">
                </div>

                <div class="col-lg-2 text-center col-sm-2 col-md-2 col-xs-2">
                  <small>Sampai</small>
                </div>

                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predC2" class="form-control" placeholder="Predikat C Kedua" required value="{{$dataKKM->predC2}}">
                </div>
              </div>
              <br>
              <!-- predD -->
              <small>Predikat D adalah nilai</small>
              <div class="row">
                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predD1" class="form-control" placeholder="Predikat D Pertama" required value="{{$dataKKM->predD1}}">
                </div>

                <div class="col-lg-2 text-center col-sm-2 col-md-2 col-xs-2">
                  <small>Sampai</small>
                </div>

                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <input type="number" name="predD2" class="form-control" placeholder="Predikat D Kedua" required value="{{$dataKKM->predD2}}">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="button">Update</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

      </div>
    </div>

    @yield('content')



    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
      <div class="container-fluid">

      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->
  <!-- Javascript -->
  <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
  @yield('footer')
</body>

</html>
