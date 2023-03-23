<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SetoranExport implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    protected $departemen;
    public function __construct($departemen)
    {

        $this->departemen = $departemen;
    }

    public function map($pengeluaran): array
    {
        return [
            $pengeluaran->kategori->name,
            $pengeluaran->uraian,
            $pengeluaran->jumlah,
            $pengeluaran->created_at,
            $pengeluaran->user->name,
        ];
    }

    public function headings(): array
    {
        return [
            'Jenis Pengeluaran',
            'Uraian',
            'Jumlah',
            'Tanggal',
            'Dibuat / Dikeluarkan',
        ];
    }

    public function query()
    {
        return Pengeluaran::with('kategori:id,name')->where('kategori_id', $this->departemen);
    }
}
