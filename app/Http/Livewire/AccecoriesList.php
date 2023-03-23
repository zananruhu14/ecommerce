<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccecoriesList extends Component
{
    public function render()
    {
        return view('livewire.accecories-list')->extends('layout.main')->section('container');
    }
}
