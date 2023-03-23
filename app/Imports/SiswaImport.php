<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    protected $dep;

    public function  __construct($departemen)
    {
        $this->dep = $departemen;
    }

    public function model(array $row)
    {

        return new siswa([
            'nama'     => $row['0'],
            'kelas'    => $row['1'],
            'tahun_ajaran'    => $row['2'],
            'departemen_id'    =>  $this->dep,
            'user_id'     => auth()->user()->id,
            'role_sumbangan' => 1
        ]);
    }
}
