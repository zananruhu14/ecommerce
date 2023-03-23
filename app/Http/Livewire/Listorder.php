<?php

namespace App\Http\Livewire;

use App\Models\Acce;
use App\Models\transaksi;
use Livewire\Component;

class Listorder extends Component
{

    public $product, $view_all, $transaksi_name, $transaksi_departemen;


    public function __construct()
    {
        $this->product = Acce::where('transaksi_id', $this->view_all)->orderBy("id", "desc")->get();
    }


    public function viewAcce($product_id)
    {
        $this->product = Acce::where('transaksi_id', $product_id)->orderBy("id", "desc")->get();
    }
    public function approve($product_id)
    {
        $transaksis = transaksi::with('acce')->where('id', $product_id)->first();
        $transaksis->status = 3;
        $transaksis->save();
        $acces =  acce::where('transaksi_id', $product_id)->get();
        foreach ($acces as $acce) {
            if ($acce->acce_status == 2) {
                $acce->acce_stock -= $acce->acce_qty;
            }
            $acce->save();
        }


        session()->flash('message', 'sukses');
    }


    public function render()
    {

        $transaksi = transaksi::all();

        return view('livewire.listorder', compact('transaksi'))->extends('layout.main')->section('container');
    }
}
