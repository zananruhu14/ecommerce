<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\Acce;

use Illuminate\Support\Facades\Http;

class Createorder extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $po = '';
    public $qty;
    public $keterangan;
    public $lokasi;
    public $nama_peminta;
    public array $quantity = [];
    public $products;

    public function mount()
    {
        $this->products = Http::get('http://192.168.10.21:3000/getdata_withQuery/' . $this->po)->collect();
        foreach ($this->products as $product) {
            $this->quantity[$product['sIndex']] = 1;
        }
    }


    public function addToCart($item_id)
    {
        $respon =  Http::get('http://192.168.10.21:3000/getId/' . $item_id)->collect();


        foreach ($respon as $item) {

            \Cart::add(array(
                'id' => $item['sIndex'],
                'name' => $item['_Acce_Name'],
                'price' =>  $item['price'],
                'quantity' =>  $this->quantity[$item['sIndex']],
                'attributes' => array(
                    'acce_code' => $item['_Acce_Code'],
                    'spec' => $item['xSpec'],
                    'desc' => $item['xDesc'],
                    'kind' => $item['_Acce_Kind'],
                    'color' => $item['xColor'],
                    'kategori' => $item['_Acce_CIQ'],
                    'size' => $item['xSize'],
                    'supplier' =>  $item['_Cust_Symbol'],
                    'po' => $item['xBuyNo'],
                    'idp' => $item['xPO'],
                    'npb' => $item['xNpb'],
                    'warehouse' => $item['xdepot'],
                    'warehouse_detail' => $item['xdepot_detail'],
                    'keterangan' => $this->keterangan,
                    'lokasi' => $this->lokasi,
                    'nama_peminta' => $this->nama_peminta
                )
            ));
        }
    }

    public function remove($id)
    {
        \Cart::remove($id);
    }

    public function checkout()
    {
        $cart = \Cart::getContent();
        $tansaksi_id = transaksi::checkout_id();


        foreach ($cart as $item) {
            $prods = new Acce();
            $prods->acce_id = $item->id;
            $prods->acce_qty = $item->quantity;
            $prods->acce_code = $item->attributes->acce_code;
            $prods->acce_kind = $item->attributes->kind;
            $prods->acce_name = $item->name;
            $prods->acce_spec = $item->attributes->spec;
            $prods->acce_desc = $item->attributes->desc;
            $prods->acce_color = $item->attributes->color;
            $prods->acce_size = $item->attributes->size;
            $prods->acce_idp = $item->attributes->po;
            $prods->acce_price = $item->price;
            $prods->acce_kategori = $item->attributes->kategori;
            $prods->acce_supplier = $item->attributes->supplier;
            $prods->acce_warehouse = $item->attributes->warehouse;
            $prods->acce_warehouse_detail = $item->attributes->warehouse_detail;
            $prods->acce_po = $item->attributes->po;
            $prods->acce_npb = $item->attributes->npb;
            $prods->acce_status = 1;
            $prods->acce_lokasi = $this->lokasi;
            $prods->acce_keterangan = $this->keterangan;
            $prods->nama_peminta = $this->nama_peminta;
            $prods->transaksi_id =  $tansaksi_id;
            $prods->save();
        }

        session()->flash('message', 'sukses');
        \Cart::clear();
    }

    public function render()

    {
        $items = Http::get('http://192.168.10.21:3000/getdata_withQuery/' . $this->po)->collect()->paginate(10);
        $userId = auth()->user()->id;
        $prod = \Cart::getContent();
        return view('livewire.createorder', compact('items', 'prod'))->extends('layout.main')->section('container');
    }
}
