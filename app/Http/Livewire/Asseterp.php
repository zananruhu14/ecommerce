<?php

namespace App\Http\Livewire;

use App\Models\inventori;
use Livewire\Component;

class Asseterp extends Component
{
    public function render()
    {
        $items = inventori::where('acce_status', 2)->get();
        return view('livewire.asseterp', compact('items'))->extends('layout.main')->section('container');
    }
}