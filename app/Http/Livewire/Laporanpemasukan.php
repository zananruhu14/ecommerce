<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\form;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class Laporanpemasukan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $form, $po, $user;
    public $paginate = 20;
    public $acce_id;
    public $qty;
    public $unit;

    public function mount($form, $user)
    {

        $this->form = $form;
        $this->user = $user;
    }


    public function remove($id)
    {
        $pengeluaran = Item::where('id', $id)->first();
        $pengeluaran->delete();
    }


    public function checkout()
    {
        $carts = Item::where('acce_status', 1)->where('user_id',  $this->user)->get();
        foreach ($carts as $cart) {
            $cart->acce_status = 2;
            $cart->form_id = $this->form;
            $cart->update();
        }

        $form = form::where('id', $this->form)->first();
        $form->edit_status = 1;
        session()->flash('message', 'sukses');
        return redirect('/gudang/order');
    }


    public function render()
    {


        $items = Http::get('http://192.168.10.21:3000/get_acce/' . $this->po)->collect()->paginate($this->paginate);

        $prod = Item::where('form_id', $this->form)->where('user_id',  $this->user)->get();
        // dd($prod);
        // $forms = Item::where('form_id', $this->form)->whereHas('form', function ($q) {
        //     $q->where('edit_status', null);
        // })->get();


        return view('livewire.laporanpemasukan', compact('items', 'prod'))->extends('layout.main')->section('container');
    }

    public function addToCart($item_id)
    {

        $respon =  Http::get('http://192.168.10.21:3000/get_acce_id/' . $item_id)->collect();

        foreach ($respon as $item) {

            $prods = new Item();
            $prods->acce_id = $item['sIndex'];
            $prods->acce_qty = $this->qty;
            $prods->acce_unit = $this->unit;
            $prods->acce_code = $item['_Acce_Code'];
            $prods->acce_kind = $item['_Acce_Kind'];
            $prods->acce_name = $item['_Acce_Name'];
            $prods->acce_spec = $item['xSpec'];
            $prods->acce_desc = $item['xDesc'];
            $prods->acce_color = $item['xColor'];
            $prods->acce_size = $item['xSize'];
            $prods->acce_idp = $item['xPO'];
            $prods->acce_price =  $item['price'];
            $prods->acce_kategori = $item['_Acce_CIQ'];
            $prods->acce_supplier = $item['_Cust_Symbol'];
            $prods->acce_warehouse = $item['xdepot'];
            $prods->acce_warehouse_detail = $item['xdepot_detail'];
            $prods->acce_po = $item['xBuyNo'];
            $prods->acce_npb = $item['xNpb'];
            $prods->acce_status = 1;
            $prods->user_id = $this->user;
            $prods->form_id = $this->form;
            $prods->save();
        }
        $this->qty = '';
        $this->emit('edit');
    }
}
