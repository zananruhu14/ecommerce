<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $phone, $address, $status, $email, $customer_id;
    public $search = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $selectedIds = [];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:customers,email',
    ];

    public function render()
    {
        $customers = Customer::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.customer-controller', compact('customers'))->extends('layout.main')->section('container');
    }

    public function store()
    {
        if (empty($this->status)) {
            $this->status = 'Active'; // atau nilai default lainnya
        }
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:45',
            'email' => 'required|string|email|unique:customers,email',
        ]);

        Customer::create($validatedData);
        session()->flash('message', 'Customer created successfully');

        $this->resetInputFields();
    }

    public function edit()
    {
        if (empty($this->status)) {
            $this->status = 'Active'; // atau nilai default lainnya
        }
        $cus = Customer::find($this->customer_id);
        $cus->name = $this->name;
        $cus->phone = $this->phone;
        $cus->address = $this->address;
        $cus->status = $this->status;
        $cus->email = $this->email;
        $cus->save();
        session()->flash('message', 'Sukses');
        $this->resetInputFields();
    }

    public function edit_id($id)
    {
        $cus = Customer::find($id);
        $this->customer_id = $id;
        $this->name = $cus->name;
        $this->phone = $cus->phone;
        $this->address = $cus->address;
        $this->status = $cus->status;
        $this->email = $cus->email;

    }

    public function delete($id)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->delete();
    }

    public function resetInputFields()
    {
        $this->customer_id = '';
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->status = '';
        $this->email = '';

    }
}
