<?php

namespace App\Http\Livewire;

use App\Jobs\ImportJob;
use App\Models\Barcode;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Allbarcode extends Component
{
    use WithFileUploads;
    public $batchId;
    public $weaving_number;
    public $importFile;
    public $importing = false;
    public $importFilePath;
    public $importFinished = false;
    public $search, $weaving, $file, $created_at, $pn;

    public function __construct()
    {

        $this->pn = Barcode::where('weaving_number', $this->weaving)->select([
            'pn_no',
            DB::raw('pn_no as pn_no'),

        ])
            ->groupBy('pn_no')
            ->value('pn_no');
    }

    public function import()
    {
        $this->validate([
            'file' => 'required',
        ]);

        $this->importing = true;
        $this->importFilePath = $this->file->store('barcodes');

        $batch = Bus::batch([
            new ImportJob($this->importFilePath, $this->weaving),
        ])->dispatch();

        $this->batchId = $batch->id;
    }

    public function getImportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function updateImportProgress()
    {
        $this->importFinished = $this->importBatch->finished();

        if ($this->importFinished) {
            Storage::delete($this->importFilePath);
            $this->importing = false;
        }
    }

    public function import2()
    {

        $this->validate([
            'file' => 'required',
        ]);

        $this->importing = true;
        $this->importFilePath = $this->file->store('barcodes');

        $batch = Bus::batch([
            new ImportJob($this->importFilePath, $this->weaving),
        ])->dispatch();

        $this->batchId = $batch->id;
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
                'combo_id' => $item->combo_id,
            ];
        });
        // dd($report);

        $combo_id = Barcode::where('weaving_number', $this->weaving)->select([
            'combo_id',
            DB::raw('COUNT(id) as total'),
            DB::raw('combo_id as combo_id'),
            DB::raw('lot_no as lot_no'),
        ])
        // ->groupBy('size_no')
            ->groupBy('combo_id')
            ->groupBy('lot_no')
            ->get();
        $lapor = [];
        $combo_id->each(function ($item) use (&$lapor) {
            $lapor[$item->lot_no][$item->combo_id] = [
                // 'count' => $item->total,
                'combo_id' => $item->combo_id,
            ];
        });

        $a = $combo_id->pluck('combo_id')->unique();

        $size_no = $cards->pluck('size_no')
        // ->sortBy('size_no')
            ->unique();

        $idp = barcode::groupBy('opo')
            ->pluck('opo')
            ->unique();

        $wev = barcode::groupBy('weaving_number')
            ->pluck('weaving_number')
            ->unique();

        return view('livewire.allbarcode', compact('barcodes', 'cards', 'report', 'size_no', 'combo_id', 'a', 'lapor', 'idp', 'wev'))->extends('layout.main')->section('container');
    }

    public function export()
    {

        return Excel::download(new PemakaianExport($this->weaving), 'hbarcode-' . $this->pn . '.xlsx');
    }
}
