@extends('layouts.admin.app')
@section('maincontent')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Komentar Pengguna</h1>
  <p class="mb-4">Data Komentar Pengguna</p>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Komentar</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Nama Pengguna</th>
              <th>JenisLayanan</th>
              <th>Parent Comment</th>
              <th>Child Comment</th>
              <th>Edit</th>
              <th>Delete</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach($Komentar as $Komentars)
              <td>{{$Komentars->id}}</td>
              <td>{{$Komentars->User->name}}</td>
              <td>{{$Komentars->Service->name}}</td>
              <td>{{$Komentars->comments_id}}</td>
              <td>{{$Komentars->komentar}}</td>
              <td><a href="#" class="btn btn-m btn-danger">Edit</a></td>
              <td><a href="#" class="btn btn-m btn-danger">Hapus</a></td>
              @endforeach

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
