@extends('layout.main')
@section('container')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <form method="post" action="/product/edit/{{ $product->id }}" enctype="multipart/form-data" >
        @csrf
    <div class="col-lg-6">
    <h4>Make the changes below</h4>
    <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play.</p>
    </div>
    <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
    <button type="submit" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save</button>
    </div>
    </div>

<div class="row mt-4">
    <div class="col-lg-4">
    <div class="card h-100">
    <div class="card-body">
    <h5 class="font-weight-bolder">Product Image</h5>
    <div class="row">
    <div class="col-12">
    <img class="w-100 border-radius-lg shadow-lg mt-3" src="{{ asset('storage/' . $product->image) }}" alt="product_image">

    </div>
    <div class="col-12 mt-4">
    <div class="d-flex">
        <input class="form-control @error('image')
        is-invalid
    @enderror" type="file" id="image" value="{{ old('image', $product->image) }}" name="image" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-8 mt-lg-0 mt-4">
    <div class="card">
    <div class="card-body">
    <h5 class="font-weight-bolder">Product Information</h5>
    <div class="row">
    <div class="col-12 col-sm-6">
    <label>Name</label>
    <input class="form-control" type="text" value="{{ old('name', $product->name) }}" name="name"/>
    </div>
    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
    <label>Weight</label>
    <input class="form-control" type="number" value="{{ old('weight', $product->weight) }}" name="weight"/>
    </div>
    </div>
    <div class="row">
     <div class="col-3">
    <label class="mt-4">Category</label>
    <select class="form-control" name="category" required id="choices-category">
        <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
        <option value="Sweater" >Sweater</option>
        <option value="Hoodie">Hoodie</option>
        <option value="Clothing">Clothing</option>

        </select>
    </div>
    <div class="col-3">
    <label class="mt-4">Price</label>
    <input class="form-control" type="text" value="{{ old('price', $product->price) }}" name="price" />
    </div>
    <div class="col-3">
        <label class="mt-4">Sizes</label>
        <select class="form-control" id="choices-sizes"  name="size">
            <option value="{{ $product->size }}" selected>{{ $product->size }}</option>
            <option value="Medium" >Medium</option>
            <option value="CSmall">Small</option>
            <option value="Large">Large</option>
            <option value="Extra Large">Extra Large</option>
            <option value="Extra Small">Extra Small</option>
        </select>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
    <label class="mt-4">Description </label>
 <textarea class="form-control" name="description"  value="{{ old('description', $product->description) }}">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="col-sm-6">

    <label>Color</label>
    <select class="form-control" name="color" id="choices-color-edit" value="{{ old('color', $product->color) }}">
    <option value="{{ $product->color }}" selected>{{ $product->color }}</option>
    <option value="Black" >Black</option>
    <option value="White">White</option>
    <option value="Blue">Blue</option>
    <option value="Orange">Orange</option>
    <option value="Green">Green</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="row mt-4">
    <div class="col-sm-4">
    <div class="card">
    <div class="card-body">
    <h5 class="font-weight-bolder">Socials</h5>
    <label>Twitter Account</label>
    <input class="form-control" type="text" value="{{ old('tw_account', $product->tw_account) }}"  name="tw_account"/>
    <label class="mt-4">Facebook Account</label>
    <input class="form-control" type="text"  value="{{ old('fb_account', $product->fb_account) }}"  name="fb_account" />
    <label class="mt-4">Instagram Account</label>
    <input class="form-control" type="text"  value="{{ old('ig_account', $product->ig_account) }}"  name="ig_account" />
    </div>
    </div>
    </div>
    <div class="col-sm-8 mt-sm-0 mt-4">
    <div class="card">
    <div class="card-body">
    <div class="row">
    <h5 class="font-weight-bolder">Pricing</h5>
    <div class="col-3">
    <label>Price</label>
    <input class="form-control" type="number" value="{{ old('price', $product->price) }}" name="price" />
    </div>
    <div class="col-4">
    <label>Currency</label>
    <select class="form-control" name="currency" id="choices-currency-edit"  >
    <option value="{{ $product->currency }}" selected="">{{ $product->currency }}</option>
    <option value="USD" >USD</option>
    <option value="EUR">EUR</option>
    <option value="GBP">GBP</option>
    <option value="CNY">CNY</option>
    <option value="INR">INR</option>
    <option value="BTC">BTC</option>
    </select>
    </div>

    </div>
    <div class="row">
    <div class="col-12">
    <label class="mt-4">Tags</label>
    <select class="form-control" name="tags"  >
    <option value="{{ $product->tags }}" selected>{{ $product->tags }}</option>
    <option value="In Stock">In Stock</option>
    <option value="Out of Stock">Out of Stock</option>
    <option value="Sale">Sale</option>
    <option value="Black Friday">Black Friday</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    </div>
</form>
    </div>
@endsection
