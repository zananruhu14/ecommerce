<?php

namespace App\Http\Livewire;

use App\Models\Pemakaianwwtp;
use App\Models\po_wwtp;
use Livewire\Component;

class Cardgrafik extends Component
{
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

        return view('livewire.cardgrafik', compact('pemasukan_thismonth', 'pemasukan_lastmonth', 'percentage_change', 'pemakaianwwtp_thismonth', 'pemakaianwwtp_last_month', 'percetage_wwtp', 'pemakaianstp_thismonth', 'pemakaianstp_last_month', 'percetage_stp'));
    }
}
