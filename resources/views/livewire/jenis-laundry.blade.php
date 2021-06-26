<form wire:submit.prevent="storeLaundry">
  @csrf
  <div class="form-group">
    <label for="">Pilih Laundry</label>
      <select wire:model="jenisLaundry" class="form-control @error('jenisLaundry') is-invalid @enderror" name="jenisLaundry" required>
        <option value="0">-- Pilih Laundry --</option>
          @foreach($laundry as $laundrys)
            <option value="{{$laundrys->id}}">{{$laundrys->name}}</option>
          @endforeach
      </select>
      @error('jenisLaundry')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="form-group mt-3">
    <label for="">Input perkiraan berat (Kg)</label>
    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required wire:model="weight">
    @error('weight')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group mt-3">
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

  <div class="form-group mt-3">
    <label for="">Masukkan alamat anda</label>
    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" wire:model="address">
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group mt-3">
    <label for="">Detail alamat (nomor rumah, apartement dll)</label>
    <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" wire:model="address2">
    @error('address2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group mt-3">
    <label for="">Kode Voucher (jika ada)</label>
    <div class="input-group">
      <input id="voucher" type="text" class="form-control @error('voucher') is-invalid @enderror" name="voucher" value="{{ old('voucher') }}" wire:model="voucher" aria-describedby="button-addon4">
      <div class="input-group-append" id="button-addon4">
        <button class="btn btn-danger btn-sm" type="button" wire:click="resetbtn">Reset</button>
        <button class="btn btn-primary btn-sm" type="button" wire:click="reedeem('{{$voucher}}')">Reedeem</button>
      </div>
    </div>
    <small class="text-danger">{{$pesan}}</small>
  </div>

  <hr>
  <h6 class="text-center">Detail transaksi</h6>
  <div class="table-responsive">
    <table class="table table-borderless table-sm" width="100%" cellspacing="0">
      <tr>
        <td width="50%">Laundry</td>
        <td width="50%">@currency($harga)</td>
      </tr>
      <tr>
        <td width="50%">Biaya Layanan</td>
        <td width="50%">@currency($antar)</td>
      </tr>
      <tr>
        <td width="50%">Subtotal</td>
        <td width="50%">@currency($subtotal)</td>
      </tr>
      <tr>
        <td width="50%">Diskon Voucher {{$discount}} %</td>
        <td width="50%">@currency($potongan)</td>
      </tr>
      <tr>
        <th width="50%">Total</th>
        <th width="50%">@currency($total)</th>
      </tr>
    </table>
  </div>
  <button type="submit" class="btn btn-primary btn-sm btn-block">
    {{ __('Proses Order') }}
  </button>
</form>
