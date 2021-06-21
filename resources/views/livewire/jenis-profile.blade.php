<div id="unamediv">
<label>Username</label>
<input wire:model="username" type="text" class="form-control"/>
@if ($errors->has('username'))
<p style="color: red;">{{$errors->first('username')}}</p>
@endif
<button wire:click="save" class="btn btn-primary">Save</button>
</div>
