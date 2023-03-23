<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class PemasukanExport implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function map($pemasukan): array
    {
        return [
            $pemasukan->kategori->name,
            $pemasukan->uraian,
            $pemasukan->jumlah,
            $pemasukan->created_at,
            $pemasukan->user->name,
        ];
    }

    public function headings(): array
    {
        return [
            'Jenis Pemasukan',
            'Uraian',
            'Jumlah',
            'Tanggal',
            'Dibuat / Diterima',
        ];
    }

    public function query()
    {
        return Pemasukan::with('kategori:id,name')->where('departemen_id', auth()->user()->departemen_id);
    }
}
