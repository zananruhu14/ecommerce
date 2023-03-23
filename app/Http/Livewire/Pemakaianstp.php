<?php

namespace App\Http\Livewire;

use App\Exports\PemakaianStpExport;
use App\Models\item_wwtp;
use App\Models\Pemakaianwwtp;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Pemakaianstp extends Component
{
    public $orderProducts = [];
    public $allProducts = [];
    public $start, $end, $stp;
    public $items;
    public $grouped;
    public $days, $date;
    public $selectedMonth, $edit_id;
    public $edit_tanggal, $edit_inlet, $edit_outlet, $id_edit;
    public $filter = [];

    protected $listeners = ['tanggalPemakaian'];

    public function tanggalPemakaian($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function mount()
    {
        $this->allProducts = item_wwtp::where('status', 2)->orWhere('status', 3)->get();
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
            $pemakaian = new Pemakaianwwtp();
            $pemakaian->stp = $this->stp;
            $pemakaian->item_wwtp_id = $value['product_id'];
            $pemakaian->qty = $value['quantity'];
            $pemakaian->tanggal = $this->date;
            $pemakaian->status = 2;
            $pemakaian->save();

        }
        session()->flash('message', 'Sukses');
        $this->cancel();
        return redirect('/pemakaianstp');
    }

    public function cancel()
    {
        $this->outlet = '';
        $this->inlet = '';
        $this->orderProducts = [];
    }
    public function render()
    {
        $this->items = item_wwtp::whereNotIn('id', $this->filter)->whereIn('status', [2, 3])->get();

        $pemakaianwwtps = Pemakaianwwtp::where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->get();

        $this->grouped = $pemakaianwwtps->groupBy('tanggal')->sortBy(function ($item) {
            return $item[0]->tanggal;
        }, SORT_NATURAL, false)
            ->map(function ($items) {
                return [
                    'id' => $items[0]->id,
                    'stp' => $items[0]->stp,
                    'tanggal' => $items[0]->tanggal,
                    'item_wwtp_ids' => $items->pluck('item_wwtp_id')->toArray(),
                    'qtys' => $items->pluck('qty')->toArray(),
                ];
            });

        $total_wwtp = Pemakaianwwtp::where('pemakaianwwtps.status', 1)->whereBetween('tanggal', [$this->start, $this->end])
            ->leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->selectRaw('SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->first();
        $total_stp = Pemakaianwwtp::where('pemakaianwwtps.status', 2)->whereBetween('tanggal', [$this->start, $this->end])
            ->leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->selectRaw('SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->first();

        $grantototal = Pemakaianwwtp::whereBetween('tanggal', [$this->start, $this->end])
            ->leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->selectRaw('SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->first();
        return view('livewire.pemakaianstp', compact('total_wwtp', 'total_stp', 'grantototal'))->extends('layout.main')->section('container');
    }

    public function sendData($tanggal)
    {
        $pemakaian = Pemakaianwwtp::where('status', 2)->where('tanggal', $tanggal)->get();
        foreach ($pemakaian as $key => $value) {
            $value->delete();
        }
    }

    public function export()
    {

        return Excel::download(new PemakaianStpExport($this->start, $this->end), 'pemakaian.xlsx');
    }
}