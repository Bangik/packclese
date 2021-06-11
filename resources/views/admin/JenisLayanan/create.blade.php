@extends('layouts.admin.app')
@section('maincontent')


  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tambah Layanan</h1>
      <p class="mb-4">Data JenisLayanan</a>.</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah JenisLayanan</h6>
          </div>
          <div class="card-body">
            <form action="{{route('Store-JenisLayanan')}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label for="name">JenisLayanan</label>
                <input type="text" name="jenis" class="form-control  @error('jenis') is-invalid @enderror" placeholder="JenisLayanan">
                  @error('jenis')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group">
                <div class="text-center">
                  <button type="submit" class="btn btn-success">Tambah</button>
                </div>
              </div>
            </form>
              </div>
          </div>
        </div>





<!-- End of Main Content -->


@endsection
