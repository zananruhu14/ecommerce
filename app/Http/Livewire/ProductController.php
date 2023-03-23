<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $name, $description, $price, $product_id;

    public function delete($id)
    {
        $pengeluaran = Product::where('id', $id)->first();
        $pengeluaran->delete();

        return redirect('/product')->with('success', 'Successfully!');
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.product.index', compact('products'))->extends('layout.main')->section('container');
    }

    public function redirectToNewProduct()
    {
        return redirect()->to('product/create');
    }

}
