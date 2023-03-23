<?php

namespace App\Http\Livewire;

use App\Models\item_wwtp;
use App\Models\Pemakaianwwtp;
use Livewire\Component;

class Siswalivewire extends Component
{

    public $orderProducts = [];
    public $allProducts = [];
    public $start, $end, $inlet, $outlet;
    public $items;
    public $grouped;
    public $days, $date;
    public $selectedMonth, $edit_id;
    public $edit_tanggal, $edit_inlet, $edit_outlet, $id_edit;
    public $totalCostPerM3 = 0;
    public $totalCost = 0;
    public $filter = [];

    protected $listeners = ['tanggalPemakaian'];

    public function tanggalPemakaian($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function mount()
    {
        $this->allProducts = item_wwtp::where('status', 1)->orWhere('status', 3)->get();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1],
        ];
    }

    public function editId($id)
    {
        $this->edit_id = Pemakaianwwtp::where('id', $id)->first();
        $this->id_edit = $id;

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
            $pemakaian = new Pemakaianwwtp();
            $pemakaian->inlet = $this->inlet;
            $pemakaian->outlet = $this->outlet;
            $pemakaian->item_wwtp_id = $value['product_id'];
            $pemakaian->qty = $value['quantity'];
            $pemakaian->tanggal = $this->date;
            $pemakaian->status = 1;
            $pemakaian->save();

        }
        session()->flash('message', 'Sukses');
        $this->cancel();
        return redirect('/pemakaian');
    }

    public function cancel()
    {
        $this->outlet = '';
        $this->inlet = '';
        $this->orderProducts = [];
    }

    public function render()
    {

        $this->items = item_wwtp::whereNotIn('id', $this->filter)->where('status', 1)->orWhere('status', 3)->get();

        $totalCosts = array_fill(0, count($this->items), 0);
        // dd($totalCosts);
        $pemakaianwwtps = Pemakaianwwtp::where('status', 1)->whereBetween('tanggal', [$this->start, $this->end])->get();

        $this->grouped = $pemakaianwwtps->groupBy('tanggal')
            ->sortBy(function ($item) {
                return $item[0]->tanggal;
            }, SORT_NATURAL, false)
            ->map(function ($items) {
                return [
                    'id' => $items[0]->id,
                    'inlet' => $items[0]->inlet,
                    'outlet' => $items[0]->outlet,
                    'tanggal' => $items[0]->tanggal,
                    'item_wwtp_ids' => $items->pluck('item_wwtp_id')->toArray(),
                    'qtys' => $items->pluck('qty')->toArray(),
                ];
            });
        // dd($this->grouped);
        return view('livewire.siswa', compact('totalCosts'))->extends('layout.main')->section('container');
    }

    public function sendData($tanggal)
    {
        $pemakaian = Pemakaianwwtp::where('status', 1)->where('tanggal', $tanggal)->get();
        foreach ($pemakaian as $key => $value) {
            $value->delete();
        }
    }

}