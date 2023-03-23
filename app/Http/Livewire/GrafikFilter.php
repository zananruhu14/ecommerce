<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GrafikFilter extends Component
{
    public $start, $end;
    public $first, $second;
    protected $listeners = ['tanggallinegrafik'];

    public function mount($awal, $akhir)
    {

        $this->start = $awal;
        $this->end = $akhir;
        $this->first = $awal;
        $this->second = $akhir;

    }

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