@extends('layouts.admin.app')
@section('maincontent')
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Trashed PAGE</h1>
      <p class="mb-4">Trashed Layanan</a>.</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Trashed Layanan</h6>
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
                              <a href="{{route('Restore-Layanan', ['id' => $Layanans->id])}}" class="btn btn-m btn-warning"><i class="fas fa-trash-restore"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash"></i> </a>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>
                  @foreach($Layanan as $Layanans2)
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            Apakah kamu yakin untuk menghapusnya ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="{{route('Delete-Layanan', ['id' => $Layanans2->id])}}" class="btn btn-danger">Hapus</a>
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach

              </div>
          </div>
      </div>
</div>



<!-- End of Main Content -->


@endsection
