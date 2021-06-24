<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class JenisProfileImage extends Component
{
    use WithFileUploads;

    public $image;

    public function save($id)
    {

      $dataimage = User::find($id);

      $this->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
      ]);

      $image_path = "";

        if (file_exists($dataimage->profile_photo_path)) {
          unlink($dataimage->profile_photo_path);
        }
        $varimage = $this->image;
        $image_name = time().$varimage->getClientOriginalName();

        $this->image->storeAs('public/images/', $image_name);

      $dataimage->profile_photo_path = $image_name;
      $dataimage->save();

      $this->emit('refreshParent');
      $this->dispatchBrowserEvent('closeModal_image');


    }




    public function render()
    {
        return view('livewire.jenis-profile-image');
    }
}
