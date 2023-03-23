<?php

namespace App\Http\Livewire;

use App\Models\form;
use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Support\Facades\Auth;

class Pemasukanumum extends Component
{
    protected $listeners = ['updated' => 'render'];



    public function remove($id)
    {
        $pengeluaran = Item::where('id', $id)->first();
        $pengeluaran->delete();
    }




    public function checkout()
    {
        $carts = Item::where('acce_status', 1)->where('user_id', auth()->user()->id)->get();
        $tansaksi_id = form::checkout_id();

        foreach ($carts as $cart) {
            $cart->acce_status = 2;
            $cart->form_id = $tansaksi_id;
            $cart->update();
        }
        session()->flash('message', 'sukses');
    }



    public function render()
    {
        $prod = Item::where('acce_status', 1)->where('user_id', auth()->user()->id)->get();
        return view('livewire.cart-counter', compact('prod'));
    }
}
