<?php

namespace App\Http\Livewire;

use App\Models\inventori;
use Livewire\Component;

class Consumbaleerp extends Component
{
    public function render()
    {
        $items = inventori::where('acce_status', 1)->get();
        return view('livewire.consumbaleerp', compact('items'))->extends('layout.main')->section('container');
    }
}