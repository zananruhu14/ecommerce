<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SumbanganExport implements FromQuery, WithMapping, WithHeadings
{

    use Exportable;

    protected $pembayaran;
    protected $departemen;
    public function __construct($pembayaran, $departemen)
    {
        $this->pembayaran = $pembayaran;
        $this->departemen = $departemen;
    }
    public function map($pemasukan): array
    {
        return [
            $pemasukan->siswa->nama,
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
            'Nama Siswa',
            'Jenis Pemasukan',
            'Uraian',
            'Jumlah',
            'Tanggal',
            'Dibuat / Diterima',
        ];
    }

    public function query()
    {
        return Pemasukan::with('kategori:id,name')->with('siswa:id,nama')->where('departemen_id',  $this->departemen)->where('kategori_id', $this->pembayaran)->whereHas('siswa', function ($q) {
            $q->where('role_sumbangan', 1);
        });
    }
}
