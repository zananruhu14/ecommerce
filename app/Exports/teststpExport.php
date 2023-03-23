<?php

namespace App\Exports;

use App\Models\ph;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class teststpExport implements FromView
{
    protected $start, $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $cekph1 = ph::where('shift', 1)->where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->orderBy('tanggal', 'asc')->get();
        $cekph2 = ph::where('shift', 2)->where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->orderBy('tanggal', 'asc')->get();
        $group = ph::groupBy('tanggal')->where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->orderBy('tanggal', 'asc')->pluck('tanggal');
        return view('exports.testwwtp', compact('cekph1', 'cekph2', 'group'));
    }
}