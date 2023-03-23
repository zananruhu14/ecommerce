<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use Livewire\Component;

class CartonHnm extends Component
{
    public $file_no = 220877;
    public $awal = "2023-01-29";
    public $akhir = "2023-01-30";
    public $start, $end;
    public $search_awal, $search_akhir;
    public $stlye;
    public $idp;
    public $buyer;

    protected $listeners = ['cartonTod'];

    public function cartonTod($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function submit()
    {

        $this->awal = $this->search_awal;
        $this->akhir = $this->search_akhir;

    }
    public function render()
    {
        $results = Carton::query_carton($this->start, $this->end);
        $count = 0;
        foreach ($results as $row) {
            $count += $row->TA + $row->TB + $row->TC + $row->TD + $row->TE + $row->TF + $row->TG + $row->TH + $row->TI + $row->TJ;
        }

        // Initialize arrays to hold total quantity of each size and whether each carton is an assort or a solid
        $ukuranJumlah = array_fill_keys(range('H1', 'H10'), 0);
        $ukuranSolid = array_fill_keys(range('H1', 'H10'), 0);

        // Iterate through results and add up the quantities for each size
        foreach ($results as $result) {
            // Determine whether carton is an assort or a solid

            // Add up the quantities for each size
            if (isset($ukuranJumlah[$result->H1])) {
                $ukuranJumlah[$result->H1] += $result->aA;
                $ukuranSolid[$result->H1] += $result->sA;
            } else {
                $ukuranJumlah[$result->H1] = $result->aA;
                $ukuranSolid[$result->H1] = $result->sA;
            }
            // ... dst untuk H2 sampai H10
            if (isset($ukuranJumlah[$result->H2])) {
                $ukuranJumlah[$result->H2] += $result->aB;
                $ukuranSolid[$result->H2] += $result->sB;
            } else {
                $ukuranJumlah[$result->H2] = $result->aB;
                $ukuranSolid[$result->H2] = $result->sB;
            }

            if (isset($ukuranJumlah[$result->H3])) {
                $ukuranJumlah[$result->H3] += $result->aC;
                $ukuranSolid[$result->H3] += $result->sC;
            } else {
                $ukuranJumlah[$result->H3] = $result->aC;
                $ukuranSolid[$result->H3] = $result->sC;
            }
            // ... dst untuk H2 sampai H10
            if (isset($ukuranJumlah[$result->H4])) {
                $ukuranJumlah[$result->H4] += $result->aD;
                $ukuranSolid[$result->H4] += $result->sD;
            } else {
                $ukuranJumlah[$result->H4] = $result->aD;
                $ukuranSolid[$result->H4] = $result->sD;
            }

            if (isset($ukuranJumlah[$result->H5])) {
                $ukuranJumlah[$result->H5] += $result->aE;
                $ukuranSolid[$result->H5] += $result->sE;
            } else {
                $ukuranJumlah[$result->H5] = $result->aE;
                $ukuranSolid[$result->H5] = $result->sE;
            }

            if (isset($ukuranJumlah[$result->H6])) {
                $ukuranJumlah[$result->H6] += $result->aF;
                $ukuranSolid[$result->H6] += $result->sF;
            } else {
                $ukuranJumlah[$result->H6] = $result->aF;
                $ukuranSolid[$result->H6] = $result->sF;
            }
            // ... dst untuk H2 sampai H10
            if (isset($ukuranJumlah[$result->H7])) {
                $ukuranJumlah[$result->H7] += $result->aG;
                $ukuranSolid[$result->H7] += $result->sG;
            } else {
                $ukuranJumlah[$result->H7] = $result->aG;
                $ukuranSolid[$result->H7] = $result->sG;
            }

        }
        $hasil = Carton::query_assort();
        $cek = collect(json_decode(json_encode($hasil), true))
            ->filter(function ($item) {
                return str_contains($item['xSpec'], 'Carton Box Perforated');
            });
        $formattedSpecs = [];
        foreach ($cek as $item) {
            $spec = $item['xSpec'];

            preg_match('/UK\.(\d+)\*(\d+)\*(\d+)/', $spec, $matches);

            if (count($matches) == 4) {
                $tinggi = $matches[1];
                $lebar = $matches[2];
                $panjang = $matches[3];
                $formattedSpec = $tinggi . ' x ' . $lebar . ' x ' . $panjang;

                $formattedSpecs[] = $formattedSpec;
            }
        }

        $cek_solid = collect(json_decode(json_encode($hasil), true))
            ->filter(function ($item) {
                return str_contains($item['xSpec'], 'Carton Box Regular');
            });

        $solid = [];
        foreach ($cek_solid as $item) {
            $spec = $item['xSpec'];

            preg_match('/UK\.(\d+)\*(\d+)\*(\d+)/', $spec, $matches);

            if (count($matches) == 4) {
                $tinggi = $matches[1];
                $lebar = $matches[2];
                $panjang = $matches[3];
                $formattedSpecs_solid = $tinggi . ' x ' . $lebar . ' x ' . $panjang;

                $solid[] = $formattedSpecs_solid;
            }
        }

        $grouped_stock = collect(json_decode(json_encode($hasil), true))->groupBy('xSpec')->map(function ($stock) {
            return [
                'size' => $stock[0]['xSpec'],
                'total' => collect($stock)->sum('xtQty'),
                'xPO' => collect($stock)->unique('xPO')->pluck('xPO'),
                'xBuyNo' => collect($stock)->unique('xBuyNo')->pluck('xBuyNo'),
            ];
        });

        return view('livewire.carton-hnm', compact('results', 'ukuranJumlah', 'ukuranSolid', 'formattedSpecs', 'solid', 'grouped_stock', 'count'))->extends('layout.dashboard')->section('container');
    }
}
