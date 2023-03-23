<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboardcontroller extends Component
{
    public function render()
    {
        return view('livewire.dashboardcontroller')->extends('layout.main')->section('container');
    }
}