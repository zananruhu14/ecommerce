<?php

namespace App\Http\Livewire;

use App\Models\Carton;
use Livewire\Component;

class CartonJcp extends Component
{
    public $p = "37";
    public $l = "30";
    public $t = "11";
    public $submit_p, $submit_l, $submit_t;

    public function submit()
    {
        $this->p = $this->submit_p;
        $this->l = $this->submit_l;
        $this->t = $this->submit_t;

    }
    public function render()
    {

        $results = Carton::query_jcp($this->p, $this->l, $this->t);
        $hasil = collect($results);
        $total_pcs = $hasil->sum('xBoxPcs');
        $total_cnt = $hasil->sum('xBoxCNT');
        $style = $hasil->pluck('rStyle_ID')->unique();
        $idp = $hasil->pluck('xPO')->unique();

        $grouped_items = Carton::query_acce_jcp();

        $dimensions = array(); // array untuk menyimpan dimensi

        foreach ($grouped_items as $item) {
            $xSpec = $item->xSpec;
            preg_match_all('!\d+!', $xSpec, $matches);
            list($length, $width, $height) = $matches[0];
            // $length, $width, $height contains the extracted values
            $dimensions[] = array(
                'length' => $length,
                'width' => $width,
                'height' => $height,
            );
        }

        $grouped_stock = collect(json_decode(json_encode($grouped_items), true))->groupBy('xSpec')->map(function ($stock) {
            return [
                'size' => $stock[0]['xSpec'],
                'total' => collect($stock)->sum('xtQty'),
                'xPO' => collect($stock)->unique('xPO')->pluck('xPO'),
                'xBuyNo' => collect($stock)->unique('xBuyNo')->pluck('xBuyNo'),
            ];
        });

        return view('livewire.carton-jcp', compact('hasil', 'style', 'idp', 'total_pcs', 'total_cnt', 'grouped_stock', 'dimensions'))->extends('layout.dashboard')->section('container');
    }
}
