<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;
use Carbon\Carbon;

class Detailitem extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 50;
    public $tai, $podol, $end, $start;


    protected $listeners = ['updateDates'];

    public function updateDates($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function render()
    {

        $this->start = Carbon::now()->startOfDay();
        $this->end = Carbon::now()->endOfDay();
        if (auth()->user()->is_admin == 3) {
            $items = item::with('form')->where('acce_po', 'like', '%' . $this->tai . '%')->whereBetween('created_at', [$this->start, $this->end])->whereHas('form', function ($q) {
                $q->where('status', 'like', '%' . $this->podol . '%');
            })->where('user_id', auth()->user()->id)->paginate($this->paginate);
        } else {
            $items = item::with('form')->where('acce_po', 'like', '%' . $this->tai . '%')->whereBetween('created_at', [$this->start, $this->end])->whereHas('form', function ($q) {
                $q->where('status', 'like', '%' . $this->podol . '%');
            })->latest()->paginate($this->paginate);
        }


        return view('livewire.detailitem', compact('items'))->extends('layout.main')->section('container');
    }
}
