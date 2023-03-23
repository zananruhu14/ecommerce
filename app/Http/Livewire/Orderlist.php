<?php

namespace App\Http\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\form;
use App\Models\Item;
use App\Models\npb;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Orderlist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product, $view_all, $selectedRows = [];
    public $filter = [];
    public $sj;
    public $search;
    public $paginate = 50;
    public $status = '';
    public $start, $end;

    protected $listeners = ['updateDates'];

    public function updateDates($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }



    public function __construct()
    {
        $this->product = Item::where('form_id', $this->view_all)->orderBy("id", "desc")->get();
    }


    public function viewAcce($product_id)
    {

        $this->product = Item::where('form_id', $product_id)->orderBy("id", "desc")->get();
    }


    public function approve()
    {
        foreach ($this->selectedRows as $row) {

            if (auth()->user()->is_admin == 2) {
                $transaksis = form::where('id', $row)->where('status', 1)->first();
                $transaksis->status = 3;
                $transaksis->secre_id = auth()->user()->id;
            } elseif (auth()->user()->is_admin == 1) {
                $transaksis = form::where('id', $row)->where('status', 3)->first();
                $transaksis->status = 4;
            } else {
                $transaksis = form::where('id', $row)->where('status', 4)->first();
                $transaksis->status = 5;
            }
            $transaksis->save();
        }
        $this->selectedRows = [];




        session()->flash('message', 'sukses');
    }
    public function approveAdmin()
    {

        $npb = npb::checkout();
        foreach ($this->selectedRows as $row) {
            $transaksis = form::where('id', $row)->where('status', 3)->first();
            $transaksis->status = 5;
            $transaksis->no_sj = $this->sj;
            $transaksis->npb_id = $npb;
            $transaksis->save();


            $items = Item::where('form_id', $row)->get();
            foreach ($items as $item) {
                $item->npb_id = $npb;
                $item->save();
            }

            $this->selectedRows = [];
            session()->flash('message', 'sukses');
        }
    }

    public function approveSj()
    {

        $this->validate([
            'sj' => 'required',
        ]);

        foreach ($this->selectedRows as $row) {
            $forms = form::where('id', $row)->where('status', 4)->first();
            $forms->status = 5;
            $forms->no_sj = $this->sj;
            $forms->save();
        }
        $this->selectedRows = [];
        $this->sj = '';

        session()->flash('message', 'sukses');
    }

    public function cancel()
    {
        $this->sj = '';
    }



    public function deleteForm($form_id)
    {

        $form = form::where('id', $form_id)->first();
        $form->status = 2;
        $form->save();
        session()->flash('message', 'sukses');
        $this->selectedRows = [];
    }


    public function render()
    {
        // $this->start = Carbon::now()->startOfda();
        // $this->end = Carbon::now()->endOfMonth();

        if (auth()->user()->is_admin == 3) {
            $transaksi = form::whereBetween('created_at', [$this->start, $this->end])->where('id', 'like', '%' . $this->search . '%')->where('status', 'like', '%' . $this->status . '%')->where('user_id', auth()->user()->id)->paginate($this->paginate);
        } else {
            $transaksi = form::whereBetween('created_at', [$this->start, $this->end])->where('id', 'like', '%' . $this->search . '%')->where('status', 'like', '%' . $this->status . '%')->latest()->paginate($this->paginate);
        }


        return view('livewire.orderlist', compact('transaksi'))->extends('layout.main')->section('container');
    }
}
