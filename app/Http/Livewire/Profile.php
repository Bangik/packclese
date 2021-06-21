<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{

  public $action;
  public $selectedItem;
  public $selectedAction;

  protected $listeners = [
      'refreshParent' => '$refresh'
  ];

  public function selectItem($itemId, $action)
  {
      $this->selectedItem = $itemId;
      $this->selectedAction = $action;

      if ($action == 'Username') {
        $this->emit('getModelId', $this->selectedItem);
        $this->emit('getActionId', $this->selectedAction);
        $this->dispatchBrowserEvent('openModal');;

      }

      elseif ($action == 'Email') {
        $this->emit('getModelId', $this->selectedItem);
        $this->emit('getActionId', $this->selectedAction);
        $this->dispatchBrowserEvent('openModal_email');;

      }

      elseif ($action == 'update_address') {
        $this->emit('getModelId', $this->selectedItem);
        $this->emit('getActionId', $this->selectedAction);
        $this->dispatchBrowserEvent('openModal_address');;

      }

      else {
        $this->emit('getModelId', $this->selectedItem);
        $this->emit('getActionId', $this->selectedAction);
        $this->dispatchBrowserEvent('openModal_phoneNumber');;

      }

  }

    public function render()
    {

        return view('livewire.profile')->extends('user.profile');
    }
}
