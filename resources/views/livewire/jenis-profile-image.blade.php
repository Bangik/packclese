<div>
  <div class="card-body pt-0 pt-md-4">
    @if ($avatar)
    Photo Preview:<p><img src="{{ $avatar->temporaryUrl() }}" width="300"></p>
    @endif
    <input type="file" wire:model="avatar">

    @error('avatar') <span class="error">{{ $message }}</span> @enderror

  </div>

    <button wire:click="save({{ Auth::user()->id }})" class="btn btn-primary">Save</button>
</div>
