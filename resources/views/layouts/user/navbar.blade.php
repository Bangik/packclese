
<div class="container d-flex justify-content-between align-items-center">

  <div class="logo">
    <h1><a href="index.html">SoftLand</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  </div>

  <nav id="navbar" class="navbar">
    <ul>
      <li><a class="active " href="index.html">Home</a></li>
      <li><a href="features.html">Layanan</a></li>
      <li><a href="pricing.html">Riwayat Transaksi</a></li>
      <li><a href="blog.html">Blog</a></li>
      @if (Route::has('login'))
      @auth
      <li class="dropdown"><a href="#">{{Auth::user()->name}}
      <img class="img-profile rounded-circle" src="{{asset(Auth::user()->profile_photo_path)}}" width="25" height="25">
      <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="{{route('profile')}}">Profile</a></li>
          <li><a href="#">Pengaturan</a></li>
          <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Keluar</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      @else
        <li>
          <a href="{{ route('login') }}">Log in</a>
        </li>
        @endauth
        @endif
        <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->

</div>
