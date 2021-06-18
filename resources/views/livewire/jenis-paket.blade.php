<form wire:submit.prevent="storePaket">
  @csrf
  <div>
    @if (session()->has('pesan'))
      <div class="alert alert-success">
          {{ session('pesan') }}
      </div>
    @endif
  </div>

  <div class="form-row">
    <div class="form-group col-sm-6">
      <label for="">Pilih Provinsi Asal</label>
        <select wire:model="provinsi1" class="form-control" name="provinsi1" required>
          <option value="0">-- Pilih Provinsi --</option>
            @foreach($listProvinsi as $key => $provinsi)
              <option value="{{$provinsi['province_id']}}">{{$provinsi['province']}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
      <label for="">Pilih Kota Asal</label>
        <select wire:model="origin" class="form-control" name="origin" required>
          @if(count($listKota) == 0)
            <option value="0">-- Pilih Kota --</option>
          @endif
          @foreach($listKota as $key => $kota)
            <option value="{{$kota['city_id']}}">{{$kota['city_name']}}</option>
          @endforeach
        </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-sm-6">
      <label for="">Pilih Provinsi Tujuan</label>
        <select wire:model="provinsi2" class="form-control" name="provinsi2" required>
          <option value="0">-- Pilih Provinsi --</option>
            @foreach($listProvinsi as $key => $provinsi2)
              <option value="{{$provinsi2['province_id']}}">{{$provinsi2['province']}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
      <label for="">Pilih Kota Tujuan</label>
        <select wire:model="destination" class="form-control" name="destination" required>
          @if(count($listKota2) == 0)
            <option value="0">-- Pilih Kota --</option>
          @endif
          @foreach($listKota2 as $key => $kota2)
            <option value="{{$kota2['city_id']}}">{{$kota2['city_name']}}</option>
          @endforeach
        </select>
    </div>
  </div>

  <div class="form-group">
    <label for="">Pilih Kurir</label>
      <select wire:model="courier" class="form-control" name="courier" required>
        <option value="">-- Pilih Kurir --</option>
        <option value="pos">Pos Indonesia</option>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
      </select>
  </div>


  <div class="form-group">
    <label for="">Berat (gram)</label>
    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required wire:model="weight">
    @error('weight')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Pilih Layanan Kurir {{strtoupper($courier)}}</label>
      <select wire:model="layananCourier" class="form-control" name="layananCourier" required>
        @if(!empty($listLayananCourier))
        @foreach($listLayananCourier as $layananCourir)
          <option value="{{$layananCourir['service']}},{{$layananCourir['cost'][0]['value']}}">{{strtoupper($courier)}} - {{$layananCourir['service']}} - Estimasi {{$layananCourir['cost'][0]['etd']}} Hari -  Rp. {{$layananCourir['cost'][0]['value']}} </option>
        @endforeach
        @else
        <option value="pilih,0">-- Pilih Layanan --</option>
        @endif
      </select>
  </div>

  <div class="form-group">
    <label for="address">Masukkan Tujuan dengan lengkap</label>
    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" wire:model="address" required>
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Perjelas alamat (nomor rumah, ancer ancer dll, boleh kosong)</label>
    <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" wire:model="address2" >
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

  <p>Ongkir Rp. {{$ongkir}}</p>
  <p>Biaya Layanan Rp. {{$harga}}</p>
  <p>Subtotal Rp. {{$subtotal}}</p>
  <p>Diskon Voucher {{$discount}} % Rp. {{$potongan}}</p><br>
  <p>Total Rp. {{$total}}</p>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Proses Order') }}
    </button>
  </div>
</form>
