<?php

namespace App\Exports;

use App\Models\Pemakaianwwtp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class summaryExport implements FromView
{
    public function view(): View
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
        return view('exports.summary', compact('grouped', 'total_wwtp', 'total_stp', 'grantototal'));
    }
}