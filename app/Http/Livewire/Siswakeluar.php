<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Siswakeluar extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 50;
    public $tai, $podol;

    public function render()
    {

        if (auth()->user()->is_admin == 3) {
            $items = item::with('form')->where('id', 'like', '%' . $this->tai . '%')->whereHas('form', function ($q) {
                $q->where('status', 'like', '%' . $this->podol . '%');
            })->where('user_id', auth()->user()->id)->paginate($this->paginate);
        } else {
            $items = item::with('form')->where('id', 'like', '%' . $this->tai . '%')->whereHas('form', function ($q) {
                $q->where('status', 'like', '%' . $this->podol . '%');
            })->latest()->paginate($this->paginate);
        }

        return view('livewire.siswakeluar', compact('items'))->extends('layout.main')->section('container');
    }
}