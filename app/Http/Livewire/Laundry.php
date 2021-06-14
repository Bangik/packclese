<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;

class Laundry extends Component
{
  public function render()
  {
    return view('livewire.laundry', [
      'laundry' => Layanan::where('jenisservice_id', 1)->get()
    ])->extends('layouts.app');
  }
}
