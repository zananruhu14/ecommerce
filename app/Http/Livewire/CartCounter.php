<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\transaksi;
use Livewire\Component;

class CartCounter extends Component
{




    public function render()
    {
        $prod = Item::where('acce_status', 1)->where('user_id', auth()->user()->id)->get();
        return view('livewire.cart-counter', compact('prod'));
    }
}
