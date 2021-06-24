<div>
  <div class="card-body pt-0 pt-md-4">
    @if ($image)
    Photo Preview:<p><img src="{{ $image->temporaryUrl() }}" width="300"></p>
    @endif
    <input type="file" wire:model="image">

    @error('image') <span class="error">{{ $message }}</span> @enderror

  </div>

    <button wire:click="save({{ Auth::user()->id }})" class="btn btn-primary">Save</button>
</div>
