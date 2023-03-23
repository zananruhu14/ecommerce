<?php

namespace App\Exports;

use App\Models\item_wwtp;
use App\Models\Pemakaianwwtp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PemakaianExport implements FromView
{
    protected $start, $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {

        $totalCostPerM3 = 0;
        $totalCost = 0;
        $items = item_wwtp::whereIn('status', [1, 3])->get();
        $totalCosts = array_fill(0, count($items), 0);

        $pemakaianwwtps = Pemakaianwwtp::where('status', 1)->whereBetween('tanggal', [$this->start, $this->end])->get();

        $grouped = $pemakaianwwtps->groupBy('tanggal')
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
        return view('exports.pemakaian', compact('total_wwtp', 'total_stp', 'grantototal', 'items', 'grouped', 'totalCostPerM3', 'totalCost'));
    }
}
