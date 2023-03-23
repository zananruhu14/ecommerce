<?php

namespace App\Http\Livewire;

use App\Models\item_wwtp;
use Livewire\Component;

class Pemakaian extends Component
{

    public $orderProducts = [];
    public $allProducts = [];
    public $tanggal, $inlet, $outlet;

    protected $listeners = ['tanggalPemakaian'];

    public function tanggalPemakaian($start)
    {
        $this->tanggal = $start;

    }

    public function mount()
    {
        $this->allProducts = item_wwtp::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1],
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }
    public function save()
    {

        foreach ($this->orderProducts as $key => $value) {
            $pemakaian = new Pemakaian();
            $pemakaian->inlet = $this->inlet;
            $pemakaian->outlet = $this->outlet;
            $pemakaian->item_wwtp_id = $value['product_id'];
            $pemakaian->qty = $value['quantity'];
            $pemakaian->tanggal = $this->tanggal;
            $pemakaian->save();

        }
        session()->flash('message', 'sukses');
        $this->cancel();
    }

    public function cancel()
    {
        $this->outlet = '';
        $this->inlet = '';
        $this->orderProducts = [];
    }

    public function render()
    {
        $items = item_wwtp::all();
        return view('livewire.pemakaian', compact('items'))->extends('layout.main')->section('container');
    }
}