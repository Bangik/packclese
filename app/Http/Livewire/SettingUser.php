<?php

namespace App\Http\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Hash;

class SettingUser extends Component
{
    public $old_password;
    public $confirm_password;
    public $new_password;

    protected $rules = [
      'old_password' => 'required',
      'new_password' => ['required', 'string', 'min:8'],
      'confirm_password' => 'required',

   ];

    public function update($id)
    {
      $this->validate();

      $Users = User::find($id);

      if (Hash::check($this->old_password, $Users->password)) {


        User::where('id',$id)->update([
          'password' => Hash::make($this->new_password),
        ]);


        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal_setting');
        $this->dispatchBrowserEvent('berhasil');

      }else {
        $this->dispatchBrowserEvent('gagal');
      }

    }




    public function render()
    {
        return view('livewire.setting-user');
    }
}
