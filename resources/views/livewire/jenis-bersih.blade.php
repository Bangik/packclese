<form wire:submit.prevent="storeBersih">
  @csrf
  <div>
    @if (session()->has('pesan'))
      <div class="alert alert-success">
          {{ session('pesan') }}
      </div>
    @endif
  </div>
  <div class="form-group">
    <label for="">Masukkan alamat anda</label>
    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required wire:model="address">
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Perjelas alamat (nomor rumah, ancer ancer dll. boleh kosong)</label>
    <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" required wire:model="address2">
    @error('address2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <span>Luas Ruangan :</span> <small class="text-danger">*plus Rp.20.000/m<sup>2</small>
  <div class="form-row">
    <div class="form-group col-sm-6">
      <label for="">Panjang (m)</label>
      <input id="space" type="number" class="form-control @error('space') is-invalid @enderror" name="space" value="{{ old('space') }}" required wire:model="space">
      @error('space')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-sm-6">
      <label for="">Lebar (m)</label>
      <input id="space2" type="number" class="form-control @error('space2') is-invalid @enderror" name="space2" value="{{ old('space2') }}" required wire:model="space2">
      @error('space2')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="">Kode Voucher (jika ada)</label>
    <div class="input-group">
      <input id="voucher" type="text" class="form-control @error('voucher') is-invalid @enderror" name="voucher" value="{{ old('voucher') }}" wire:model="voucher" aria-describedby="button-addon4">
      <div class="input-group-append" id="button-addon4">
        <button class="btn btn-outline-danger" type="button" wire:click="resetbtn">Reset</button>
        <button class="btn btn-outline-primary" type="button" wire:click="reedeem('{{$voucher}}')">Reedeem</button>
      </div>
    </div>
    <small class="text-danger">{{$message}}</small>
  </div>

  <br>
  <h6>Detail transaksi</h6>
  <p>Luas ruangan {{$luas}} m<sup>2</p><br>
  <p>Harga Rp. {{$subtotal}}</p><br>
  <p>Diskon Voucher {{$discount}} % Rp. {{$potongan}}</p><br>
  <p>total Rpp. {{$total}}</p><br>

  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Proses Order') }}
    </button>
  </div>
</form>
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
  })
  </script>
@endsection
