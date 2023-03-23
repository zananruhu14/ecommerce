<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboardyayasan extends Component
{

    public $file_no;
    public function render()
    {
        $results = DB::connection('erp')->select('exec sp_cal_carton_GU @SO = ?', array($this->file_no));
        $data = collect($results);

        // dd($data);
        return view('livewire.dashboardyayasan')->extends('layout.main')->section('container');
    }
}