@extends('layouts.admin.app')
@section('maincontent')

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">POST PAGE</h1>
      <p class="mb-4">This Is Post Page For Administrator</a>.</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Trashed Post</h6>
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
                            <th>Aksi</th>
                          <th>Restore</th>
                          <th>Delete</th>
                      </thead>
                      <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>JenisLayanan</th>
                            <th>Deskripsi</th>
                            <th>Rate</th>
                            <th>Price</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach($Layanan as $Layanans)
                          <tr>
                            <td>{{$Layanans->name}}</td>
                            <td>{{$Layanans->jenisServices->jenis}}</td>
                            <td>{!!Str::limit($Layanans->description, '50')!!}</td>
                            <td>{{$Layanans->rate}}</td>
                            <td>{{$Layanans->price}}</td>
                            <td> <img src="{{asset($Layanans->picturePath)}}" alt="{{$Layanans->picturePath}}" width="50" height="50"> </td>
                            <td>
                              <a href="{{route('Restore-Layanan', ['id' => $Layanans->id])}}" class="btn btn-m btn-warning"><i class="fas fa-edit"></i></a>
                              <a href="{{route('Delete-Layanan', ['id' => $Layanans->id])}}" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $loop->iteration }}"> <i class="fas fa-trash"></i> </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>




<!-- End of Main Content -->


@endsection
