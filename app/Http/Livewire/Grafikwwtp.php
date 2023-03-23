<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Grafikwwtp extends Component
{
    public $start, $end, $first, $second;
    protected $listeners = ['tanggallinegrafik'];

    // public function mount($start, $end)
    // {
    //     // $this->emit('tanggalline', $this->start, $this->end);
    //     // $this->start = $start;
    // }
    public function tanggallinegrafik($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function filter()
    {
        return redirect('/grafik/wwtp/' . $this->start . '/' . $this->end);
    }
    public function render()
    {
        return view('livewire.grafikwwtp')->extends('layout.main')->section('container');
    }
}