<form wire:submit.prevent="storeTitip">
  @csrf
  <div>
    @if (session()->has('pesan'))
      <div class="alert alert-success">
          {{ session('pesan') }}
      </div>
    @endif
  </div>
  <div class="form-group">
    <label for="">Pilih Layanan Titip Barang</label>
      <select wire:model="jenisTitip" class="form-control @error('jenisTitip') is-invalid @enderror" name="jenisTitip" required>
        <option value="0">-- Pilih Layanan Titip Barang --</option>
          @foreach($titips as $titip)
            <option value="{{$titip->id}}">{{$titip->name}}</option>
          @endforeach
      </select>
      @error('jenisTitip')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="form-group">
    <label for="">Jumlah Box / Motor</label><small class="text-danger"> *minimal 3 box</small>
    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required wire:model="quantity">
    @error('quantity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Tanggal mulai titip</label>
    <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" wire:model="start" required>
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Tanggal akhir titip</label>
    <input id="ends" type="date" class="form-control @error('ends') is-invalid @enderror" name="ends" value="{{ old('ends') }}" wire:model="ends" required>
    @error('address')
        <span class="invalid-feedback" role="ends">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Masukkan alamat anda</label><small class="text-danger"> *Kosongkan jika pilih jemput sendiri</small>
    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" wire:model="address">
  </div>

  <div class="form-group">
    <label for="">Perjelas alamat (nomor rumah, ancer ancer dll. boleh kosong)</label>
    <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" wire:model="address2">
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

  <p>{{$namaLayanan}} Rp. {{$harga}}</p>
  <p>Waktu titip {{$waktuTitip}} {{$messageTime}}</p>
  <p>Subtotal Rp. {{$subtotal}}</p>
  <p>Diskon Voucher {{$discount}} % Rp. {{$potongan}}</p><br>
  <p>Total Rp. {{$total}}</p>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Proses Order') }}
    </button>
  </div>
</form>
