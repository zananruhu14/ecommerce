<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class PengeluaranExport implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
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
        return Pengeluaran::with('kategori:id,name')->where('departemen_id', auth()->user()->departemen_id);
    }
}
