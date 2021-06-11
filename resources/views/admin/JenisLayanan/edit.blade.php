@extends('layouts.admin.app')
@section('maincontent')


  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Edit Layanan</h1>
      <p class="mb-4">Data JenisLayanan</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit JenisLayanan</h6>
          </div>
          <div class="card-body">
            <form action="{{route('Update-JenisLayanan', ['id'=> $JenisLayanan->id])}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label for="jenis">JenisLayanan</label>
                <input type="text" name="jenis" class="form-control" value="{{$JenisLayanan->jenis}}">
              </div>
              <div class="form-group">
                <div class="text-center">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
              </div>
            </form>
              </div>
          </div>
        </div>




<!-- End of Main Content -->


@endsection
