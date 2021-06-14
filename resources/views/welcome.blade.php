<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Packclese</title>

  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <style>

  </style>

  <style>
    body {
      background: rgb(100, 149, 237);
    }

    footer {
      background: #303036;
      color: #d3d3d3;
      height: 400px;
      position: relative;
    }

    .footer .footer-bottom {
      background: #343a40;
      color: #686868;
      height: 50px;
      width: 100%;
      text-align: center;
      bottom: 0px;
      left: 0px;
      padding-top: 20px;
    }

    .card {
      margin-top: 10px;
      margin-bottom: 10px;
      font-family: roboto;
      border-radius: 20px;
      background: rgb(100, 149, 237);
      box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.9);
    }

    .card-image {
      grid-area: image;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    .card-text {
      grid-area: text;
      margin: 20px;
      color: white;
    }

    .card-text p {
      color: grey;
      font-size: 15px;
      font-weight: 300;
    }

    .card-title {
      margin-top: 0px;
      font-size: 26px;
      color: white;
    }

    .carousel-item {
      height: 100vh;
      min-height: 350px;
      background: no-repeat center center scroll;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Packclese</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Layanan</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Riwayat Transaksi</a>
          </li>
          @if (Route::has('login'))
          @auth
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              {{Auth::user()->name}}
              <img class="img-profile rounded-circle" src="{{asset(Auth::user()->profile_photo_path)}}" width="25" height="25">
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Pengaturan</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Keluar</a>
            </div>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          @else
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link active">Log in</a>
          </li>
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">First Slide</h2>
            <p class="lead">This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Second Slide</h2>
            <p class="lead">This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Third Slide</h2>
            <p class="lead">This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-3" style="color: white;">Tampilan sementara</h2>

      <div class="row">

        @foreach($jenisLayanan as $jenisLayanans)
        <div class="col-md-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{$jenisLayanans->jenis}}</h6>
            </div>
            <div class="card-body">
              deskripsinya ....
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <center>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::asset('/img/bersih.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Layanan Bersih Bersih</h5>
              <p class="card-text">Layanan pembersihan umum ruangan secara menyeluruh serta profesional.</p>
              <center><a href="#" class="btn btn-primary">Visit</a></center>
            </div>
          </div>
        </center>
      </div>

      <div class="col-lg-6 col-sm-12">
        <center>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::asset('/img/wkwkw.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Layanan Titip Barang</h5>
              <p class="card-text">Layanan penitipan barang seperti buku, baju, perabotan dan lai sebagainya.</p>
              <center><a href="#" class="btn btn-primary">Visit</a></center>
            </div>
          </div>
        </center>
      </div>

      <div class="col-lg-6 col-sm-12">
        <center>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::asset('/img/wkwkw.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Layanan Titip Motor</h5>
              <p class="card-text">Layanan penitipan motor dengan menjamin kondisi dan keamanan motor</p>
              <center><a href="#" class="btn btn-primary">Visit</a></center>
            </div>
          </div>
        </center>
      </div>

      <div class="col-lg-6 col-sm-12">
        <center>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::asset('/img/wkwkw.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Layanan Laundry</h5>
              <p class="card-text">Layanan laundry mulai dari cuci sampai setrika dengan berbagai macam penawaran.</p>
              <center><a href="#" class="btn btn-primary">Visit</a></center>
            </div>
          </div>
        </center>
      </div>

      <div class="col-lg-6 col-sm-12">
        <center>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::asset('/img/wkwkw.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Layanan Paket Barang</h5>
              <p class="card-text">Layanan paket barang pelanggan, bekerja sama dengan beberapa jasa pengiriman.</p>
              <center><a href="#" class="btn btn-primary">Visit</a></center>
            </div>
          </div>
        </center>
      </div>

      <div class="col-lg-6 col-sm-12">
        <center>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{URL::asset('/img/wkwkw.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Layanan Paket Motor</h5>
              <p class="card-text">Layanan pengiriman kendaraan bermotor melalui jasa pengiriman yang sudah bekerja sama.</p>
              <center><a href="#" class="btn btn-primary">Visit</a></center>
            </div>
          </div>
        </center>
      </div>
    </div>
  </div>

  <div class="footer">
    <div class="footer-content">
      <div class="footer-section about"></div>
      <div class="footer-section link"></div>
      <div class="footer-section contact-from"></div>
    </div>
    <div class="footer-bottom">
      <h5 style="color: white;">&copy; Copyright 2021 | Designed by Packclese</h5>
    </div>
  </div>
  <!-- Page Content -->

</body>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</html>