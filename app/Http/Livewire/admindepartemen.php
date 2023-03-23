<?php

namespace App\Http\Livewire;

use Livewire\Component;

class admindepartemen extends Component
{
    public function render()
    {
        return view('livewire.departemen')->extends('layout.movie')->section('container');
    }
}
