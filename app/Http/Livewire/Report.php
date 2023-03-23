<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\kategori;
use App\Models\departemen;

class Report extends Component
{
    public $departemen;

    public function mount(departemen $departemen)
    {
        $this->departemen = $departemen;
    }

    public function render()
    {
        $pemaskans =  Pemasukan::where('departemen_id', $this->departemen->id)->orderBy("id", "desc")->paginate(10);
        $pengeluarans =  Pengeluaran::where('departemen_id', $this->departemen->id)->orderBy("id", "desc")->paginate(5);
        $ttlpemasukan = Pemasukan::where('departemen_id', $this->departemen->id)->sum('jumlah');
        $ttlpengeluaran = Pengeluaran::where('departemen_id', $this->departemen->id)->sum('jumlah');
        $maxpemasukan = kategori::where('departemen_id', $this->departemen->id)->where('jenis', 1)->withSum('pemasukan', 'jumlah')->orderBy('pemasukan_sum_jumlah', 'desc')->take(8)->get();
        $maxpengeluaran = kategori::where('departemen_id', $this->departemen->id)->where('jenis', 2)->withSum('pengeluaran', 'jumlah')->orderBy('pengeluaran_sum_jumlah', 'desc')->take(4)->get();

        $grafikpemasukan = Pemasukan::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(jumlah) as total')
            ->where('departemen_id', $this->departemen->id)
            ->groupBy('year', 'month')
            ->orderBy("id", "asc")
            ->pluck('total');

        $grafikpengeluaran = Pengeluaran::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(jumlah) as total')
            ->where('departemen_id', $this->departemen->id)
            ->groupBy('year', 'month')
            ->orderBy("id", "asc")
            ->pluck('total');
        return view('livewire.report', [
            "ttlpemasukan" => $ttlpemasukan,
            "ttlpengeluaran" => $ttlpengeluaran,
            "kas" => $ttlpemasukan -= $ttlpengeluaran,
            'maxpemasukan' => $maxpemasukan,
            'maxpengeluaran' => $maxpengeluaran,
            "grafikpemasukan" => $grafikpemasukan,
            "grafikpengeluaran" => $grafikpengeluaran,
            "pemasukans" => $pemaskans,
            "pengeluarans" => $pengeluarans,
        ])->extends('layout.main')->section('container');
    }
}
