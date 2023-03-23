<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductStore extends Controller
{
    public function index()
    {
        return view('livewire.product.store');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'size' => 'required',
            'color' => 'required',
            'currency' => 'required',
            'tags' => 'required',
            'tw_account' => 'required',
            'fb_account' => 'required',
            'ig_account' => 'required',
            'description' => 'required',
            'weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        Product::create($validatedData);
        return redirect('/product')->with('success', 'Succesfully!');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('livewire.product.edit', [
            'product' => $product,
        ]);
    }
    public function update(Request $request, $id)
    {

        $rules = ([
            'name' => 'required',
            'category' => 'required',
            'size' => 'required',
            'color' => 'required',
            'currency' => 'required',
            'tags' => 'required',
            'tw_account' => 'required',
            'fb_account' => 'required',
            'ig_account' => 'required',
            'description' => 'required',
            'weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',

        ]);

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $id)
            ->update($validatedData);
        return redirect('/product')->with('success', 'Guru TPQ Berhasil Di Update!');

        // $valdikecamatan = $kecamatan('kecamatan_id');

    }

}