<?php

namespace App\Http\Livewire;

use App\Models\inventori;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class BarcodeController extends Component
{

    public $po;
    public $acce_id;
    public $paginate = 20;

    public function addConsumble($acce_id)
    {

        $respon = Http::get('http://192.168.10.21:3000/getId/' . $acce_id)->collect();
        foreach ($respon as $item) {
            $inventori = new inventori();
            $inventori->acce_id = $acce_id;
            $inventori->acce_qty = $item['xtQty'];
            $inventori->acce_code = $item['_Acce_Code'];
            $inventori->acce_kind = $item['_Acce_Kind'];
            $inventori->acce_name = $item['_Acce_Name'];
            $inventori->acce_spec = $item['xSpec'];
            $inventori->acce_desc = $item['xDesc'];
            $inventori->acce_color = $item['xColor'];
            $inventori->acce_size = $item['xSize'];
            $inventori->acce_idp = $item['xBuyNo'];
            $inventori->acce_price = $item['price'];
            $inventori->acce_kategori = $item['_Acce_CIQ'];
            $inventori->acce_supplier = $item['_Cust_Symbol'];
            $inventori->acce_warehouse = $item['xdepot'];
            $inventori->acce_warehouse_detail = $item['xdepot_detail'];
            $inventori->acce_po = $item['xPO'];
            $inventori->acce_npb = $item['xNpb'];
            $inventori->acce_status = 1;
            $inventori->save();
        }
        session()->flash('message', 'sukses');
    }

    public function addAsset($acce_id)
    {

        $respon = Http::get('http://192.168.10.21:3000/getId/' . $acce_id)->collect();
        foreach ($respon as $item) {
            $inventori = new inventori();
            $inventori->acce_id = $acce_id;
            $inventori->acce_qty = $item['xtQty'];
            $inventori->acce_code = $item['_Acce_Code'];
            $inventori->acce_kind = $item['_Acce_Kind'];
            $inventori->acce_name = $item['_Acce_Name'];
            $inventori->acce_spec = $item['xSpec'];
            $inventori->acce_desc = $item['xDesc'];
            $inventori->acce_color = $item['xColor'];
            $inventori->acce_size = $item['xSize'];
            $inventori->acce_idp = $item['xBuyNo'];
            $inventori->acce_price = $item['price'];
            $inventori->acce_kategori = $item['_Acce_CIQ'];
            $inventori->acce_supplier = $item['_Cust_Symbol'];
            $inventori->acce_warehouse = $item['xdepot'];
            $inventori->acce_warehouse_detail = $item['xdepot_detail'];
            $inventori->acce_po = $item['xPO'];
            $inventori->acce_npb = $item['xNpb'];
            $inventori->acce_status = 2;
            $inventori->save();
        }
        session()->flash('message', 'sukses');
    }

    public function render()
    {
        $items = Http::get('http://192.168.10.21:3000/getdata_withQuery/')->collect();
        foreach ($items as $key => $item) {
            if (inventori::where('acce_id', $item['sIndex'])->exists()) {
                unset($items[$key]);
            }
        }

        if ($this->po !== null) {
            $items = Http::get('http://192.168.10.21:3000/getdata_withQuery/' . $this->po)->collect();
            foreach ($items as $key => $item) {
                if (inventori::where('acce_id', $item['sIndex'])->exists()) {
                    unset($items[$key]);
                }
            }
        }

        return view('livewire.barcode-controller', compact('items'))->extends('layout.main')->section('container'); //view
    }
}