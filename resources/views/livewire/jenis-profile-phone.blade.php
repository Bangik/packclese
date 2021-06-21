<div id="emaildiv">
<label>Phone Number</label>
<input wire:model="phoneNumber" type="text" class="form-control"/>
@if ($errors->has('phoneNumber'))
<p style="color: red;">{{$errors->first('phoneNumber')}}</p>
@endif
<button wire:click="save" class="btn btn-primary">Save</button>
</div>
