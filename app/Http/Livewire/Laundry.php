<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;

class Laundry extends Component
{
  public function render()
  {
    $laundry = Layanan::all();
    // dd($laundry);
    return view('livewire.laundry', compact('laundry'))->extends('layouts.app');
  }
}
