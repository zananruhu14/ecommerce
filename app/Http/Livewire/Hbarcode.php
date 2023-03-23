<?php

namespace App\Http\Livewire;

use App\Exports\sheet;
use App\Imports\BarcodeImport;
use App\Imports\BardcodenewImport;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Barcode;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class hbarcode extends Component
{

    use WithFileUploads;
    public $search, $weaving, $file, $created_at, $pn;


    public function __construct()

    {

        $this->pn =  Barcode::where('weaving_number', $this->weaving)->select([
            'pn_no',
            DB::raw('pn_no as pn_no'),

        ])
            ->groupBy('pn_no')
            ->value('pn_no');
    }




    public function import()
    {

        $this->validate([
            'file' => 'required|max:204800|file',
        ]);
        ini_set('max_execution_time', 1800);
        Excel::import(new BarcodeImport($this->weaving), $this->file);
        session()->flash('message', 'Sukses');
    }

    public function import2()
    {

        $this->validate([
            'file' => 'required|max:204800|file',
        ]);
        ini_set('max_execution_time', 1800);
        Excel::import(new BardcodenewImport($this->weaving), $this->file);
        session()->flash('message', 'Sukses');
    }
    public function render()
    {

        $barcodes = DB::table('barcodes')
            // ->where('weaving_number', $this->weaving)
            ->paginate(15);


        $cards = Barcode::where('weaving_number', $this->weaving)
            ->select([
                'size_no',
                DB::raw('COUNT(id) as total'),
                DB::raw('combo_id as combo_id'),
                DB::raw('lot_no as lot_no'),

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



        return view('livewire.allbarcode', compact('barcodes', 'cards', 'report', 'size_no', 'combo_id', 'a', 'lapor'))->extends('layout.main')->section('container');
    }

    public function export()
    {

        return Excel::download(new sheet($this->weaving), 'hbarcode-' . $this->pn . '.xlsx');
    }
}
