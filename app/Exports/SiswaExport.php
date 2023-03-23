<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    use Exportable;

    protected $pembayaran;
    protected $departemen;
    public function __construct($departemen)
    {

        $this->departemen = $departemen;
    }
    public function map($siswa): array
    {
        return [
            $siswa->nama,
            $siswa->kelas,
            $siswa->tahun_ajaran,
            $siswa->created_at,
            $siswa->user->name,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Kelas',
            'Tahun Ajaran',
            'Tanggal',
            'Dibuat / Dikeluarkan',
        ];
    }

    public function query()
    {
        return siswa::where('departemen_id', $this->departemen)->where('role_sumbangan', 1);
    }
}
