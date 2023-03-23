<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class OrderController extends Component
{
    public $customerId, $productId, $quantity;
    public $selected = [];
    public $orderProducts = [];
    public $allProducts = [];
    public $search;
    public function mount()
    {
        $this->allProducts = Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1],
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }
    public function render()
    {
        $customers = Customer::all();
        $products = Product::all();
        $orders = Order::with('customer', 'products')
            ->when($this->search, function ($query, $search) {
                return $query->whereHas('customer', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->when($this->search, function ($query, $search) {
                return $query->whereHas('products', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->get();

        return view('livewire.order-controller', compact('customers', 'products', 'orders'))->extends('layout.main')->section('container');
    }

    public function createOrder()
    {
        foreach ($this->orderProducts as $key => $value) {
            // Validasi input
            $this->validate([
                'customerId' => 'required|exists:customers,id',
            ]);

            // Cari customer dan product yang sesuai dengan input
            $customer = Customer::findOrFail($this->customerId);
            $product = Product::findOrFail($value['product_id']);

            // Hitung total harga pesanan
            $totalAmount = $product->price * $value['quantity'];

            // Buat pesanan baru
            $order = new Order;
            $order->customer_id = $customer->id;
            $order->product_id = $value['product_id'];
            $order->total_amount = $totalAmount;
            $order->status = 1;
            $order->save();

            // Tambahkan product ke pesanan
            $order->products()->attach($product->id, ['quantity' => $value['quantity']]);
        }
        // Reset input form
        $this->reset(['customerId']);

        // Tampilkan pesan sukses
        session()->flash('success', 'Pesanan berhasil dibuat.');
    }

    public function paid()
    {

        foreach ($this->selected as $id) {
            $order = Order::findOrFail($id);
            $order->status = 2;
            $order->save();
        }
        $this->selected = [];
    }

    public function cancel()
    {

        foreach ($this->selected as $id) {
            $order = Order::findOrFail($id);
            $order->status = 3;
            $order->save();
        }
        $this->selected = [];
    }
}
