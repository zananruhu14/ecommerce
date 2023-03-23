<?php

namespace App\Exports;

use App\Models\Barcode;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class databarcode implements FromView, WithTitle
{


    protected $weaving;


    public function  __construct($weaving)
    {
        $this->weaving = $weaving;
        // dd($this->weaving);
    }

    public function view(): View
    {

        return view('exports.databarcode', [
            'barcodes' => Barcode::where('weaving_number', $this->weaving)->get()
        ]);
    }
    public function title(): string
    {
        return 'barcode_dtl';
    }
}
