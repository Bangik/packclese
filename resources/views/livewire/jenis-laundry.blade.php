<form wire:submit.prevent="storeLaundry">
  @csrf
  <div class="form-group">
    <label for="">Pilih Laundry</label>
      <select wire:model="jenisLaundry" class="form-control @error('jenisservice_id') is-invalid @enderror" name="jenisservice_id">
        <option disabled selected>Jenis Laundry</option>
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

  <br>
  <h6>Detail transaksi</h6>

  <p>Laundry Rp. {{$harga}}</p>
  <p>Biaya Layanan Rp. {{$antar}}</p>
  <p>Total Rp. {{$total}}</p>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Proses Order') }}
    </button>
  </div>
</form>
