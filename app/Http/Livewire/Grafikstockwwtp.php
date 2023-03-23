<?php

namespace App\Http\Livewire;

use App\Models\item_wwtp;
use App\Models\Pemakaianwwtp;
use App\Models\po_wwtp;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Grafikstockwwtp extends Component
{
    public $start, $end;
    public $awal, $akhir;
    protected $listeners = ['tanggallinegrafik'];

    public function mount($awal, $akhir)
    {

        $this->start = $awal;
        $this->end = $akhir;
        // $this->emit('tanggalline', $this->start, $this->end);
    }

    public function tanggallinegrafik($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }
    public function render()
    {
        $pemasukan_thismonth = po_wwtp::whereMonth('created_at', date('m'))->sum('qty_po');
        $pemasukan_lastmonth = po_wwtp::whereMonth('created_at', date('m', strtotime('last month')))->sum('qty_po');
        $percentage_change = ($pemasukan_thismonth / $pemasukan_lastmonth) * 100;

        $pemakaianwwtp_thismonth = Pemakaianwwtp::where('status', 1)->whereMonth('tanggal', date('m'))->sum('qty');
        $pemakaianwwtp_last_month = Pemakaianwwtp::where('status', 1)->whereMonth('tanggal', date('m', strtotime('last month')))->sum('qty');
        $percetage_wwtp = ($pemakaianwwtp_thismonth / $pemakaianwwtp_last_month) * 10;
        $pemakaianstp_thismonth = Pemakaianwwtp::where('status', 2)->whereMonth('tanggal', date('m'))->sum('qty');
        $pemakaianstp_last_month = Pemakaianwwtp::where('status', 2)->whereMonth('tanggal', date('m', strtotime('last month')))->sum('qty');
        $percetage_stp = ($pemakaianstp_thismonth / $pemakaianstp_last_month) * 10;
        $items = item_wwtp::where('status', 1)->get();

        if ($this->awal == null) {
            $pemakaianwwtps = Pemakaianwwtp::where('status', 1)
                ->whereBetween('tanggal', [$this->start, $this->end])
                ->get();
            $pemakaianstp = Pemakaianwwtp::where('status', 2)
                ->whereBetween('tanggal', [$this->start, $this->end])
                ->get();

            $pemakaianProduct = item_wwtp::withSum(['pemakaianwwtp' => function ($query) {
                $query->whereBetween('tanggal', [$this->start, $this->end]);
            }], 'qty')
                ->orderBy('pemakaianwwtp_sum_qty', 'desc')
                ->get();

            $cekph = DB::table('phs')
                ->select(DB::raw("CONVERT(date, tanggal) as tanggal"),
                    DB::raw('AVG(qty) as qty'),
                    DB::raw('round(AVG(temperatur),2) as temperatur'),
                    DB::raw('round(AVG(cod),2) as cod'),
                    DB::raw('round(AVG(bod),2) as bod'),
                    DB::raw('round(AVG(tds),2) as tds'),
                    DB::raw('round(AVG(tss),2) as tss'),
                    DB::raw('round(AVG(color),2) as color'),
                    DB::raw('round(AVG(do),2) as do'),
                    DB::raw('round(AVG(sv30),2) as sv30'))
                ->where('status', 1)
                ->whereBetween('tanggal', [$this->start, $this->end])
                ->groupBy(DB::raw("CONVERT(date, tanggal)"))
                ->get();

            $cekstp = DB::table('phs')
                ->select(DB::raw("CONVERT(date, tanggal) as tanggal"),
                    DB::raw('AVG(qty) as qty'),
                    DB::raw('round(AVG(temperatur),2) as temperatur'),
                    DB::raw('round(AVG(cod),2) as cod'),
                    DB::raw('round(AVG(bod),2) as bod'),
                    DB::raw('round(AVG(tds),2) as tds'),
                    DB::raw('round(AVG(tss),2) as tss'),
                    DB::raw('round(AVG(color),2) as color'),
                    DB::raw('round(AVG(do),2) as do'),
                    DB::raw('round(AVG(sv30),2) as sv30'))
                ->where('status', 2)
                ->whereBetween('tanggal', [$this->start, $this->end])
                ->groupBy(DB::raw("CONVERT(date, tanggal)"))
                ->get();
        } else {
            $pemakaianwwtps = Pemakaianwwtp::where('status', 1)
                ->whereBetween('tanggal', [$this->awal, $this->akhir])
                ->get();
            $pemakaianstp = Pemakaianwwtp::where('status', 2)
                ->whereBetween('tanggal', [$this->awal, $this->akhir])
                ->get();

            $pemakaianProduct = item_wwtp::withSum(['pemakaianwwtp' => function ($query) {
                $query->whereBetween('tanggal', [$this->awal, $this->akhir]);
            }], 'qty')
                ->orderBy('pemakaianwwtp_sum_qty', 'desc')
                ->get();

            $cekph = DB::table('phs')
                ->select(DB::raw("CONVERT(date, tanggal) as tanggal"),
                    DB::raw('AVG(qty) as qty'),
                    DB::raw('round(AVG(temperatur),2) as temperatur'),
                    DB::raw('round(AVG(cod),2) as cod'),
                    DB::raw('round(AVG(bod),2) as bod'),
                    DB::raw('round(AVG(tds),2) as tds'),
                    DB::raw('round(AVG(tss),2) as tss'),
                    DB::raw('round(AVG(color),2) as color'),
                    DB::raw('round(AVG(do),2) as do'),
                    DB::raw('round(AVG(sv30),2) as sv30'))
                ->where('status', 1)
                ->whereBetween('tanggal', [$this->awal, $this->akhir])
                ->groupBy(DB::raw("CONVERT(date, tanggal)"))
                ->get();

            $cekstp = DB::table('phs')
                ->select(DB::raw("CONVERT(date, tanggal) as tanggal"),
                    DB::raw('AVG(qty) as qty'),
                    DB::raw('round(AVG(temperatur),2) as temperatur'),
                    DB::raw('round(AVG(cod),2) as cod'),
                    DB::raw('round(AVG(bod),2) as bod'),
                    DB::raw('round(AVG(tds),2) as tds'),
                    DB::raw('round(AVG(tss),2) as tss'),
                    DB::raw('round(AVG(color),2) as color'),
                    DB::raw('round(AVG(do),2) as do'),
                    DB::raw('round(AVG(sv30),2) as sv30'))
                ->where('status', 2)
                ->whereBetween('tanggal', [$this->awal, $this->akhir])
                ->groupBy(DB::raw("CONVERT(date, tanggal)"))
                ->get();
        }

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
                    'total_qty' => $items->sum('qty'),
                    'total_cost' => $items->sum(function ($item) {
                        return $item->item_wwtp->harga_po * $item->qty;
                    }),
                    'item_wwtp_ids' => $items->pluck('item_wwtp_id')->toArray(),
                    'qtys' => $items->pluck('qty')->toArray(),
                ];
            });

        $groupedStp = $pemakaianstp->groupBy('tanggal')
            ->sortBy(function ($item) {
                return $item[0]->tanggal;
            }, SORT_NATURAL, false)
            ->map(function ($items) {
                return [
                    'id' => $items[0]->id,
                    'stp' => $items[0]->stp,
                    'tanggal' => $items[0]->tanggal,
                    'total_qty' => $items->sum('qty'),
                    'total_cost' => $items->sum(function ($item) {
                        return $item->item_wwtp->harga_po * $item->qty;
                    }),
                    'item_wwtp_ids' => $items->pluck('item_wwtp_id')->toArray(),
                    'qtys' => $items->pluck('qty')->toArray(),
                ];
            });

        $stocks = item_wwtp::withSum('po_wwtp as total_qty', 'qty_po')->withSum('pemakaianwwtp as total_pemakaian', 'qty')->get();
        $items = item_wwtp::whereIn('status', [1, 3])->get();
        $items_stp = item_wwtp::whereIn('status', [2, 3])->get();
        return view('livewire.grafikstockwwtp', compact('pemasukan_thismonth', 'pemasukan_lastmonth', 'percentage_change', 'pemakaianwwtp_thismonth', 'pemakaianwwtp_last_month', 'percetage_wwtp', 'pemakaianstp_thismonth', 'pemakaianstp_last_month', 'percetage_stp', 'items', 'grouped', 'groupedStp', 'pemakaianProduct', 'stocks', 'cekph', 'cekstp', 'items', 'items_stp'))->extends('layout.print')->section('container');
    }
}