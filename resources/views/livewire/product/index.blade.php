<!-- resources/views/livewire/products/index.blade.php -->
<div>
    @if (session()->has('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
    <div class="row">

        <div class="col-12">
        <div class="card">

        <div class="card-header pb-0">
        <div class="d-lg-flex">
        <div>
        <h5 class="mb-0">All Products</h5>
        <p class="text-sm mb-0">
        A lightweight, extendable, dependency-free javascript HTML table plugin.
        </p>
        </div>
        <div class="ms-auto my-auto mt-lg-0 mt-4">
        <div class="ms-auto my-auto">

        <button wire:click="redirectToNewProduct"  class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Product</button>
        </div>
        </div>
        </div>
        </div>
        <div class="card-body px-0 pb-0">
        <div class="table-responsive">
        <table class="table table-flush" id="products-list">
        <thead class="thead-light">

        <tr>
        <th>Product</th>
        <th>Category</th>
        <th>Price</th>
        <th>Weight</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Action</th>
        </tr>

        </thead>
        <tbody>
            @foreach ($products as $p)
        <tr>
        <td>
        <div class="d-flex">
        <img class="w-10 ms-3"  src="{{ asset('storage/' . $p->image) }}" alt="hoodie">
        <h6 class="ms-3 my-auto">{{ $p->name }}</h6>
        </div>
        </td>
        <td class="text-sm">{{ $p->category }}</td>
        <td class="text-sm">  @currency($p->price)</td>
        <td class="text-sm">{{ $p->weight }}</td>
        <td class="text-sm">{{ $p->price }}</td>
        <td>
        <span class="badge badge-danger badge-sm">{{ $p->tags }}</span>
        </td>
        <td class="text-sm">
        <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
        <i class="fas fa-eye text-secondary"></i>
        </a>
        <a href="product/edit/{{ $p->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
        <i class="fas fa-user-edit text-secondary"></i>
        </a>
        <a ddata-bs-toggle="tooltip" data-bs-original-title="Delete product" wire:click="delete({{ $p->id }})">
        <i class="fas fa-trash text-secondary"></i>
        </a>
        </td>
        </tr>
        @endforeach

        </tbody>

        </table>
        {{ $products->links() }}
        </div>
        </div>
        </div>
        </div>
        </div>

</div>
