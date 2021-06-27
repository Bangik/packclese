<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('titless')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/favicons.png')}}" rel="icon">
    <link href="{{asset('img/favicons.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('SoftLand/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('SoftLand/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('SoftLand/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('SoftLand/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('SoftLand/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('SoftLand/assets/css/style.css')}}" rel="stylesheet">
    @livewireStyles
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      @include('layouts.user.navbar')
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer class="footer" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <h3>About Packclese</h3>
            <p>Packlese adalah Jasa layanan jasa penitipan barang, motor, bersih - bersih rumah, laundry dan lain sebagainya</p>
          </div>
          <div class="col-md-auto ms-auto">
            <a href="#"><span class="bi bi-envelope"> packclese2021@gmail.com</span></a>
            <div class="col-md-auto ms-auto">
              <a href="#"><span class="bi bi-facebook"> PACKCLESE</span></a>
              <div class="col-md-auto ms-auto">
                <a href="#"><span class="bi bi-whatsapp"> +6281411822</span></a>
                <div class="col-md-auto ms-auto">
                  <a href="#"><span class="bi bi-instagram"> @packclese</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright Packclese. All Rights Reserved</p>
          <div class="credits">
          </div>
        </div>
      </div>

      </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('SoftLand/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('SoftLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('SoftLand/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('SoftLand/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('SoftLand/assets/js/main.js')}}"></script>
    @yield('js')
    @livewireScripts
  </body>
</html>
