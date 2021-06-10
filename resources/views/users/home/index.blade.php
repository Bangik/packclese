<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    disini nanti menampilkan list layanan

    user {{Auth::user()->name}}

    <a class="" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Logout') }}</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </body>
</html>
