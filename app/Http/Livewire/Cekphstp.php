<?php

namespace App\Http\Livewire;

use App\Exports\teststpExport;
use App\Models\ph;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Cekphstp extends Component
{
    public $start, $end;
    public $cod, $bod, $tds, $tss, $color, $do, $sv30, $qty, $temperatur, $shift, $tanggal, $status;
    public $edit_cod, $edit_bod, $edit_tds, $edit_tss, $edit_color, $edit_do, $edit_sv30, $edit_qty, $edit_temperatur, $edit_shift, $edit_tanggal, $edit_status;
    public $jenis = 1;
    public $filter = [];
    protected $listeners = ['tanggalPh'];

    public function tanggalPh($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function newStock()
    {

        // $cekph = new ph();
        // $cekph->cod = $this->cod;
        // $cekph->bod = $this->bod;
        // $cekph->tds = $this->tds;
        // $cekph->tss = $this->tss;
        // $cekph->color = $this->color;
        // $cekph->do = $this->do;
        // $cekph->sv30 = $this->sv30;
        // $cekph->ph = $this->ph;
        // $cekph->temperatur = $this->temperatur;
        // $cekph->shift = $this->status;
        // $cekph->tanggal = $this->tanggal;
        // $cekph->save();
        // session()->flash('message', 'Sukses');
        // $this->cancel();

        $validatedData = $this->validate([
            'cod' => 'required',
            'bod' => 'required',
            'tds' => 'required',
            'tss' => 'required',
            'color' => 'required',
            'do' => 'max:255',
            'sv30' => 'required',
            'qty' => 'required',
            'temperatur' => 'required',
            'shift' => 'required',
            'tanggal' => 'required',
            'status' => 'required',

        ]);

        ph::create($validatedData);
        session()->flash('message', 'sukses');
        $this->cancel();
    }

    public function cancel()
    {

        $this->cod = '';
        $this->bod = '';
        $this->tds = '';
        $this->tss = '';
        $this->color = '';
        $this->do = '';
        $this->sv30 = '';
        $this->qty = '';
        $this->temperatur = '';
        $this->status = '';
        $this->tanggal = '';

    }

    public function edit($id)
    {
        $cek = ph::where('id', $id)->first();
        $this->edit_id = $id;
        $this->edit_cod = $cek->cod;
        $this->edit_bod = $cek->bod;
        $this->edit_tds = $cek->tds;
        $this->edit_tss = $cek->tss;
        $this->edit_color = $cek->color;
        $this->edit_do = $cek->do;
        $this->edit_sv30 = $cek->sv30;
        $this->edit_qty = $cek->qty;
        $this->edit_temperatur = $cek->temperatur;
        $this->edit_status = $cek->status;
        $this->edit_tanggal = $cek->tanggal;

    }

    public function update()
    {

        $new = ph::find($this->edit_id);
        $new->cod = $this->edit_cod;
        $new->bod = $this->edit_bod;
        $new->tds = $this->edit_tds;
        $new->tss = $this->edit_tss;
        $new->color = $this->edit_color;
        $new->do = $this->edit_do;
        $new->sv30 = $this->edit_sv30;
        $new->qty = $this->edit_qty;
        $new->temperatur = $this->edit_temperatur;
        $new->status = $this->edit_status;
        $new->shift = $this->edit_shift;
        $new->tanggal = $this->edit_tanggal;
        $new->save();
        session()->flash('message', 'Sukses');
    }
    public function render()
    {

        $cekph1 = ph::where('shift', 1)->where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->orderBy('tanggal', 'asc')->get();
        $cekph2 = ph::where('shift', 2)->where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->orderBy('tanggal', 'asc')->get();
        $group = ph::groupBy('tanggal')->where('status', 2)->whereBetween('tanggal', [$this->start, $this->end])->orderBy('tanggal', 'asc')->pluck('tanggal');
        return view('livewire.cekphstp', compact('cekph1', 'cekph2', 'group'))->extends('layout.main')->section('container');
    }
    public function sendData($id)
    {
        $pengeluaran = ph::where('id', $id)->first();
        $pengeluaran->delete();
    }

    public function export()
    {

        return Excel::download(new teststpExport($this->start, $this->end), 'dailytest.xlsx');
    }
}