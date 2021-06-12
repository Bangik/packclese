@extends('layouts.admin.app')
@section('maincontent')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">List Layanan</h1>
  <p class="mb-4">Data Layanan</p>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Layanan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama</th>
              <th>JenisLayanan</th>
              <th>Deskripsi</th>
              <th>Rate</th>
              <th>Price</th>
              <th>Gambar</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($Layanan as $Layanans)
            <tr>
              <td>{{$Layanans->name}}</td>
              <td> <a href="{{route('Edit-Layanan', ['id' => $Layanan->id])}}" class="btn btn-m btn-danger">Edit</a> </td>
              <td> <a href="{{route('Delete-Layanan', ['id' => $Layanan->id])}}" class="btn btn-m btn-danger">Hapus</a> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
