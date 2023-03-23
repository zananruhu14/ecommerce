<?php

namespace App\Http\Livewire;

use App\Models\Asset_wwtp;
use Livewire\Component;
use Livewire\WithFileUploads;

class Assetwwtp extends Component
{
    use WithFileUploads;
    public $nama_barang, $lokasi, $keterangan, $status;
    public $image;

    protected $rules = [
        'nama_barang' => 'required',
        'lokasi' => 'required',
        'keterangan' => 'required',
        'status' => 'required',
        'image' => 'image|file|max:2048',
    ];
    public function render()
    {
        $items = Asset_wwtp::all();

        return view('livewire.assetwwtp', ['items' => $items])
            ->extends('layout.main')
            ->section('container');
    }

    public function add()
    {

        $validatedData = $this->validate();

        if ($this->image) {
            $validatedData['image'] = $this->image->store('asset-images');
        }
        Asset_wwtp::create($validatedData);

        session()->flash('message', 'Data berhasil ditambahkan.');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nama_barang = '';
        $this->lokasi = '';
        $this->keterangan = '';
        $this->image = '';
        $this->status = '';
    }

}
