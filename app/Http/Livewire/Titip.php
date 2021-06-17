<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Titip extends Component
{
    public function render()
    {
        return view('livewire.titip')->extends('layouts.app');
    }
}
