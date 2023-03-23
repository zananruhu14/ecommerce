<?php

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Gudang extends Component
{


    public $po;
    public $acce_id;
    public $paginate = 20;

    public function render()
    {

        $items = Http::get('http://192.168.10.21:3000/get_acce/' . $this->po)->collect()->paginate($this->paginate);

        return view('livewire.gudang', compact('items'))->extends('layout.main')->section('container');
    }
}
