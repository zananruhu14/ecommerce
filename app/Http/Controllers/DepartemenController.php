<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Departemen as LivewireDepartemen;
use App\Models\departemen;
use App\Http\Requests\StoredepartemenRequest;
use App\Http\Requests\UpdatedepartemenRequest;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredepartemenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepartemenRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
        ]);
        Departemen::create($validatedData);
        return redirect('/sikeu/departemen')->with('success', 'Lembaga Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit(departemen $departemen)
    {
        return view('departemen.edit', [
            "departemen" => $departemen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedepartemenRequest  $request
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedepartemenRequest $request, departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(departemen $departemen)
    {
        departemen::destroy($departemen->id);
        return redirect('/sikeu/departemen')->with('success', 'lembaga Berhasil Dihapus!');
    }
}
