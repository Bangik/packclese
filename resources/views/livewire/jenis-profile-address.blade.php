<div id="addressdiv">
<label>Address</label>
<input wire:model="address" type="text" class="form-control"/>
@if ($errors->has('address'))
<p style="color: red;">{{$errors->first('address')}}</p>
@endif
<button wire:click="save" class="btn btn-primary">Save</button>
</div>
