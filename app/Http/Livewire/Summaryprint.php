<?php

namespace App\Http\Livewire;

use App\Models\Pemakaianwwtp;
use Livewire\Component;

class Summaryprint extends Component
{
    public function render()
    {
        $grouped = Pemakaianwwtp::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(CASE WHEN pemakaianwwtps.status = 1 THEN pemakaianwwtps.qty * item_wwtps.harga_po ELSE 0 END) as total_status_1, SUM(CASE WHEN pemakaianwwtps.status = 2 THEN pemakaianwwtps.qty * item_wwtps.harga_po ELSE 0 END) as total_status_2, SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->groupByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->orderByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->get();

        $total_wwtp = Pemakaianwwtp::where('pemakaianwwtps.status', 1)
            ->leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->selectRaw('SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->first();
        $total_stp = Pemakaianwwtp::where('pemakaianwwtps.status', 2)
            ->leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->selectRaw('SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->first();

        $grantototal = Pemakaianwwtp::leftJoin('item_wwtps', 'pemakaianwwtps.item_wwtp_id', '=', 'item_wwtps.id')
            ->selectRaw('SUM(pemakaianwwtps.qty * item_wwtps.harga_po) as total')
            ->first();
        return view('livewire.summaryprint', compact('grouped', 'total_wwtp', 'total_stp', 'grantototal'))->extends('layout.print')->section('container');
    }
}