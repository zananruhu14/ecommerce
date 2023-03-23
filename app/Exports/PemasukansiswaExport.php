<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Pemasukan;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class PemasukansiswaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $pembayaran;
    protected $departemen;
    public function __construct($pembayaran, $departemen)
    {
        $this->pembayaran = $pembayaran;
        $this->departemen = $departemen;
    }

    public function headings(): array
    {
        return [
            'Jenis Pemasukan',
            'Nama Siswa',
            'Kelas',
            'Tahun Ajaran',
            'Uraian',
            'Jumlah',
            'Tanggal',
            'Dibuat / Diterima',
        ];
    }

    public function view(): View
    {
        return view('exports.pemasukan', [
            'pemasukans' => Pemasukan::where('departemen_id', auth()->user()->departemen_id)->with('user')->get()
        ]);
    }
}
