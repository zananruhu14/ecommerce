<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\departemen;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            "departemens" => departemen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:3|max:255',
            'departemen_id' => 'required',
        ]);

        if ($validatedData['departemen_id'] == 1) {
            $validatedData['is_admin'] = 1;
        } elseif ($validatedData['departemen_id'] == 2 || $validatedData['departemen_id'] == 3) {
            $validatedData['is_admin'] = 2;
        } else {
            $validatedData['is_admin'] = 3;
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/sikeu/users')->with('success', 'User Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'departemens' => departemen::all(),
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = ([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'departemen_id' => 'required|max:255',
            'password' => 'required|min:3|max:255',

        ]);

        $validatedData = $request->validate($rules);

        if ($validatedData['departemen_id'] == 1) {
            $validatedData['is_admin'] = 1;
        } elseif ($validatedData['departemen_id'] == 2 || $validatedData['departemen_id'] == 3) {
            $validatedData['is_admin'] = 2;
        } else {
            $validatedData['is_admin'] = 3;
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/sikeu/users')->with('success', 'Data User Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/sikeu/users')->with('success', 'Data User Berhasil Dihapus!');
    }
}
