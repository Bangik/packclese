<div id="emaildiv">
<label>Email</label>
<input wire:model="email" type="text" class="form-control"/>
@if ($errors->has('email'))
<p style="color: red;">{{$errors->first('email')}}</p>
@endif
<button wire:click="save" class="btn btn-primary">Save</button>
</div>
