<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Adminuser extends Component
{

    public function render()
    {


        return view('livewire.adminuser', [
            "users" => User::all()
        ]);
    }
}
