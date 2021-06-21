<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class JenisProfilePhone extends Component
{
    public $phoneNumber;

    public $modelId;
    public $actionId;

    protected $listeners = [
        'getModelId','getActionId',
    ];

    public function mount()
    {
      // code...
      $this->actionId = "";
    }

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = User::find($this->modelId);

        $this->phoneNumber = $model->phoneNumber;
    }

    public function getActionId($actionId)
    {
        $this->actionId = $actionId;

    }


    public function save()
    {


        // Default data
        $data = [
            'phoneNumber' => $this->phoneNumber,
        ];


        User::find($this->modelId)->update($data);


        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal_phoneNumber');
    }




    public function render()
    {
        return view('livewire.jenis-profile-phone');
    }
}
