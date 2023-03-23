<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class sheet implements WithMultipleSheets, WithTitle
{

    protected $weaving;


    public function  __construct($weaving)
    {
        $this->weaving = $weaving;
        // dd($this->weaving);
    }
    public function sheets(): array
    {
        return [
            new databarcode($this->weaving),
            new reportbarcode($this->weaving),
        ];
    }
    public function title(): string
    {
        return 'barcode_dtl';
    }
}
