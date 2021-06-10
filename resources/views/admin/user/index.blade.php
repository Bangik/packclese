@extends('layouts.admin.app')
@section('maincontent')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">User / Pengguna</h1>
  <p class="mb-4">Data user</p>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List User / Pengguna</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomor HP</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($listUser as $listUsers)
            <tr>
              <td> <img class="img-profile rounded-circle" src="{{asset($listUsers->profile_photo_path)}}" alt="{{$listUsers->name}}"> </td>
              <td>{{$listUsers->name}}</td>
              <td>{{$listUsers->address}}</td>
              <td>{{$listUsers->phoneNumber}}</td>
              <td>{{$listUsers->email}}</td>
              <td>{{$listUsers->roles}}</td>
              <td> <a href="{{route('delete-user', ['id' => $listUsers->id])}}" class="btn btn-m btn-danger">Hapus</a> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
