<form wire:submit.prevent="storeLaundry">
  @csrf
  <div>
    @if (session()->has('pesan'))
      <div class="alert alert-success">
          {{ session('pesan') }}
      </div>
    @endif
  </div>
  <div class="form-group">
    <label for="">Pilih Laundry</label>
      <select wire:model="jenisLaundry" class="form-control @error('jenisservice_id') is-invalid @enderror" name="jenisservice_id" required>
        <option value="0">-- Pilih Laundry --</option>
          @foreach($laundry as $laundrys)
            <option value="{{$laundrys->id}}">{{$laundrys->name}}</option>
          @endforeach
      </select>
      @error('jenisservice_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="form-group">
    <label for="">Input perkiraan berat (Kg)</label>
    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required wire:model="weight">
    @error('weight')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input radio1" type="radio" name="exampleRadios" id="exampleRadios1" value="2000" checked wire:model="antar">
      <label class="form-check-label" for="exampleRadios1">
        Antar Jemput Laundry - Rp. 2000 / km
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input radio2" type="radio" name="exampleRadios" id="exampleRadios2" value="0" wire:model="antar">
      <label class="form-check-label" for="exampleRadios2">
        Antar Jemput Sendiri
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="">Masukkan alamat anda</label><small class="text-danger"> *Kosongkan jika pilih jemput sendiri</small>
    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" wire:model="address">
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

  <p>Laundry Rp. {{$harga}}</p>
  <p>Biaya Layanan Rp. {{$antar}}</p>
  <p>Subtotal Rp. {{$subtotal}}</p>
  <p>Diskon Voucher {{$discount}} % Rp. {{$potongan}}</p><br>
  <p>Total Rp. {{$total}}</p>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Proses Order') }}
    </button>
  </div>
</form>
