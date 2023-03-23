<?php

namespace App\Http\Livewire;

use App\Models\item_wwtp;
use App\Models\po_wwtp;
use Livewire\Component;

class ItemWwtp extends Component
{
    public $nama_barang, $harga, $qty, $no_po, $status_wwtp;
    public $product_id;
    public $products = [];

    public $end, $start;
    public $status_id, $status, $barang_id, $barang_nama_barang, $barang_harga, $barang_status, $pemasukan_edit_id;
    protected $listeners = ['upd'];

    public function upd($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function newStock()
    {

        $item = item_wwtp::newItem($this->nama_barang, $this->harga, $this->status_wwtp);
        $po_wwtp = new po_wwtp();
        $po_wwtp->harga_po = 1;
        $po_wwtp->item_wwtp_id = $item;
        $po_wwtp->qty_po = $this->qty;
        $po_wwtp->no_po = $this->no_po;
        $po_wwtp->save();
        $this->cancel_po();
        session()->flash('message', 'oke');
    }

    public function cancel_po()
    {
        $this->nama_barang = '';
        $this->harga = '';
        $this->qty = '';
        $this->no_po = '';
    }

    public function addStock($id)
    {
        $this->product_id = $id;
    }
    public function tambahStock()
    {
        $po = new po_wwtp();
        $po->qty_po = $this->qty;
        $po->no_po = $this->no_po;
        $po->harga_po = 1;
        $po->item_wwtp_id = $this->product_id;
        $po->save();
        session()->flash('message', 'Sukses');
        $this->cancelTambah();
    }

    public function cancelTambah()
    {
        $this->qty = '';
        $this->no_po = '';
        $this->product_id = '';
    }

    public function viewProduct($id)
    {

        $this->products = $id;
    }

    public function editProduct($id)
    {
        $pemasukan = item_wwtp::where('id', $id)->first();

        $this->barang_id = $pemasukan->id;
        $this->barang_nama_barang = $pemasukan->nama_barang;
        $this->barang_harga = $pemasukan->harga_po;
        $this->barang_status = $pemasukan->status;
        $this->pemasukan_edit_id = $id;
    }
    public function editStock()
    {
        $prod = item_wwtp::find($this->barang_id);
        $prod->status = $this->status;
        $prod->nama_barang = $this->barang_nama_barang;
        $prod->harga_po = $this->barang_harga;
        $prod->save();
        $this->barang_id = '';
        $this->nama_barang = '';
        $this->barang_nama_barang = '';
        $this->barang_harga = '';
        session()->flash('message', 'Sukses');
    }

    public function render()
    {
        $items = item_wwtp::withSum('po_wwtp as total_qty', 'qty_po')->withSum('pemakaianwwtp as total_pemakaian', 'qty')->get();

        $ceks = po_wwtp::where('item_wwtp_id', $this->products)->whereBetween('created_at', [$this->start, $this->end])->get();
        $product = item_wwtp::where('id', $this->status_id)->first();
        return view('livewire.item-wwtp', compact('items', 'ceks', 'product'))->extends('layout.main')->section('container');
    }
}
