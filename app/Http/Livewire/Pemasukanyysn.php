<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class Pemasukanyysn extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $po;
    public $acce_id;
    public $paginate = 20;
    public $qty, $unit;








    public function addToCart($item_id)
    {


        $respon =  Http::get('http://192.168.10.21:3000/get_acce_id/' . $item_id)->collect();

        foreach ($respon as $item) {

            $prods = new Item();
            $prods->acce_id = $item['sIndex'];
            $prods->acce_qty = $this->qty;
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
            $prods->acce_unit = $this->unit;
            $prods->acce_stock = $item['xtQty'];
            $prods->acce_status = 1;
            $prods->user_id = auth()->user()->id;
            $prods->save();
        }
        $prods->acce_unit = $this->unit = '';
        $this->qty = '';
        $this->emit('updated');
    }

    public function render()
    {


        $items = Http::get('http://192.168.10.21:3000/get_acce/' . $this->po)->collect()->paginate($this->paginate);

        return view('livewire.gudang', compact('items'))->extends('layout.main')->section('container');
    }
}
