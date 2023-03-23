<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OutExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $departemen;
    public function __construct($departemen)
    {

        $this->departemen = $departemen;
    }
    public function map($pemasukan): array
    {
        return [
            $pemasukan->kategori->name,
            $pemasukan->siswa->nama,
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
            'Nama Siswa',
            'Uraian',
            'Jumlah',
            'Tanggal',
            'Dibuat / Diterima',
        ];
    }

    public function query()
    {
        return Pemasukan::with('kategori:id,name')->with('siswa:id,nama')->where('departemen_id',  $this->departemen)->whereHas('siswa', function (Builder $query) {
            $query->where('role_sumbangan', 3);
        });
    }
}
