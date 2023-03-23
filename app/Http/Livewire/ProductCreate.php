<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;
    public $name;
    public $category;
    public $color;
    public $currency;
    public $tags;
    public $fb_account;
    public $ig_account;
    public $tw_account;
    public $description;
    public $weight;
    public $price;
    public $image;
    public $size;

    protected $rules = [
        'name' => 'required',
        'category' => 'required',
        'size' => 'required',
        'color' => 'required',
        'currency' => 'required',
        'tags' => 'required',
        'description' => 'required',
        'weight' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|max:1024',
    ];

    public function createProduct()
    {
        $validatedData = $this->validate();

        $imagePath = $validatedData['image']->store('public/images');

        $product = Product::create([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'size' => $validatedData['size'],
            'color' => $validatedData['color'],
            'currency' => $validatedData['currency'],
            'tags' => $validatedData['tags'],
            'fb_account' => $validatedData['fb_account'],
            'ig_account' => $validatedData['ig_account'],
            'tw_account' => $validatedData['tw_account'],
            'description' => $validatedData['description'],
            'weight' => $validatedData['weight'],
            'price' => $validatedData['price'],
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Product created successfully.');

        return redirect()->to('/produvt');
    }
    public function render()
    {
        return view('livewire.product-create')->extends('layout.main')->section('container');
    }
}