<?php

namespace App\Http\Livewire;

use App\Models\departemen;
use Livewire\Component;
use app\Models\User;
use Illuminate\Support\Facades\Http;

class Pengeluaranyayasan extends Component
{
    public $nik, $name, $email, $is_admin, $sekolah, $tempat, $ttl, $departemen, $departemen_code, $password;





    public function submit()
    {
        //on form submit validation
        $validatedData = $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:3|max:255',
            'nik' => 'required',
            'is_admin' => 'required',
            'sekolah' => 'max:255',
            'tempat' => 'max:255',
            'ttl' => 'max:255',
            'departemen' => 'max:255',
            'departemen_code' => 'max:255'

        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        session()->flash('message', 'sukses');
    }

    public function render()
    {

        $users = Http::get('http://192.168.10.21:3000/get_user/' . $this->nik)->collect();
        $user = $users->first();
        $departemens = departemen::all();


        return view('livewire.pengeluaranyayasan', compact('user', 'departemens'))->extends('layout.main')->section('container');
    }
}
