<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Barcode;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class reportbarcode implements FromView, WithTitle
{
    protected $weaving;


    public function  __construct($weaving)
    {
        $this->weaving = $weaving;
        // dd($this->weaving);
    }

    public function view(): View
    {

        $cards = Barcode::where('weaving_number', $this->weaving)
            ->select([
                'size_no',
                DB::raw('COUNT(id) as total'),
                DB::raw('combo_id as combo_id'),
                DB::raw('lot_no as lot_no')
            ])
            ->groupBy('size_no')
            ->groupBy('combo_id')
            ->groupBy('lot_no')

            ->get();



        $report = [];
        $cards->each(function ($item) use (&$report) {
            $report[$item->lot_no][$item->size_no] = [
                'count' => $item->total,
                'combo_id' => $item->combo_id
            ];
        });
        // dd($report);

        $combo_id = Barcode::where('weaving_number', $this->weaving)->select([
            'combo_id',
            DB::raw('COUNT(id) as total'),
            DB::raw('combo_id as combo_id'),
            DB::raw('lot_no as lot_no')
        ])
            // ->groupBy('size_no')
            ->groupBy('combo_id')
            ->groupBy('lot_no')
            ->get();
        $lapor = [];
        $combo_id->each(function ($item) use (&$lapor) {
            $lapor[$item->lot_no][$item->combo_id] = [
                // 'count' => $item->total,
                'combo_id' => $item->combo_id
            ];
        });

        $a = $combo_id->pluck('combo_id')->unique();

        $size_no = $cards->pluck('size_no')
            // ->sortBy('size_no')
            ->unique();
        return view('exports.reportbarcode', [
            'cards' => $cards,
            'report' => $report,
            'combo_id' => $combo_id,
            'lapor' => $lapor,
            'a' => $a,
            'size_no' => $size_no


        ]);
    }

    public function title(): string
    {
        return 'calculated';
    }
}
