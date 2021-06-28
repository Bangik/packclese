<div>
  <div class="card-body pt-0 pt-md-4">
    <label>Old Password</label>
    <input type="password" name="old_password" wire:model="old_password" class="form-control">
    @error('old_password')           <span class="eror" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
 @enderror
 <p></p>
    <label>New Password</label>
    <input type="password" name="new_password" wire:model="new_password" class="form-control">
    @error('new_password')           <span class="eror" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
</span> @enderror
<p></p>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" wire:model="confirm_password" class="form-control">

    @error('confirm_password')           <span class="eror" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
 @enderror
  </div>

    <button wire:click="update({{ Auth::user()->id }})" class="btn btn-primary">Update</button>
</div>

<script type="text/javascript">


window.addEventListener('berhasil', event => {
    alert('berhasil');
})

window.addEventListener('gagal', event => {
    alert('Password Lama Salah');
})

</script>
@livewireScripts
