@extends('layouts.admin.app')
@section('maincontent')



  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">POST PAGE</h1>
  <p class="mb-4">This Is Post Page For Administrator</a>.</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
          </div>
          <div class="card-body">
            <form action="{{route('Store-Layanan')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nama Layanan">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="jenisservice_id">Layanan</label>
                  <select class="form-control @error('jenisservice_id') is-invalid @enderror" name="jenisservice_id">
                    <option value="">Jenis Layanan</option>
                      @foreach($Layanan as $Layanans)
                        <option value="{{$Layanans->jenisservice_id}}">{{$JenisLayanan->jenis}}</option>
                      @endforeach
                  </select>
                  @error('jenisservice_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="rate">Rate</label>
                <input type="text" name="rate" class="form-control @error('rate') is-invalid @enderror" value="{{ old('rate') }}" placeholder="Rate Layanan">
                  @error('rate')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Harga Layanan">
                  @error('harga')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <p><label for="content">Deskripsi</label></p>
                <textarea id="editor" name="description" rows="8" cols="40" placeholder="Tambah Deskripsi" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="picturePath">Image</label>
                <input type="file" name="picturePath" class="form-control">

              </div>

              <div class="form-group">
                <div class="text-left">
                  <button type="submit" class="btn btn-success">Create</button>
                </div>
              </div>
            </form>
              </div>
          </div>





<!-- End of Main Content -->


@endsection
