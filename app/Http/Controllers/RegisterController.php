<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:3|max:255',
            'name' => 'required',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('ttd-images');
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login');
    }

    public function show()
    {
        return view('register');
    }
}