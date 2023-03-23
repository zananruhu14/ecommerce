<div>


    <div class="container-fluid py-4">
        <div class="d-sm-flex justify-content-between">
        <div>
        <button href="javascript:;" class="btn btn-icon bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        New order
        </button>
        </div>
        <div class="d-flex">
            <div>
            <button href="javascript:;" class="btn btn-icon bg-gradient-success mx-2" wire:click="paid()">
               Paid
                </button>
            </div>
            <div>
                <button href="javascript:;" class="btn btn-icon bg-gradient-danger mx-2" wire:click="cancel()">
                    Cancel
                     </button>
                    </div>
        <div class="input-group input-group-sm mb-3 mx-2">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="search">
              </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="table-responsive">
        <table class="table table-flush" id="datatable-search">
        <thead class="thead-light">
        <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Status</th>
        <th>Customer</th>
        <th>Product</th>
        <th>Revenue</th>
        </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
        <tr>
        <td>
        <div class="d-flex align-items-center">
         <div class="form-check">

        <input class="form-check-input" type="checkbox" id="customCheck1"  wire:model="selected" value="{{ $order->id }}">
        </div>
        <p class="text-xs font-weight-bold ms-2 mb-0">#{{$order->id}}</p>
        </div>
        </td>
        <td class="font-weight-bold">
        <span class="my-2 text-xs">{{ date('d F Y', strtotime($order->created_at)) }}</span>
        </td>
        <td class="text-xs font-weight-bold">
        <div class="d-flex align-items-center">

@if ($order->status == 1)
<button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-undo" aria-hidden="true"></i></button>
<span>
Not Paid Yet
</span>
@elseif($order->status == 2)
<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
<span>
    Paid
</span>
@elseif($order->status == 3)
<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
<span>Canceled</span>
</div>

@else
-
@endif


        </span>
        </div>
        </td>
        <td class="text-xs font-weight-bold">
        <div class="d-flex align-items-center">

        <span>{{$order->customer->name}}</span>
        </div>
        </td>
        <td class="text-xs font-weight-bold">
            @foreach($order->products as $product)
            <span class="my-2 text-xs">{{ $product->name }}</span>
        @endforeach
        </td>
        <td class="text-xs font-weight-bold">
        <span class="my-2 text-xs">{{$order->total_amount}}</span>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
    {{-- modal create --}}
    <div wire:ignore.self  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="edit-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Form</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="createOrder">
                @csrf



                <div class="card">
                    <label for="">Customer</label>
                    <select class="form-control" name="" id="" wire:model="customerId">
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach

                    </select>

                    <div class="card-body">
                        <table class="table" id="products_table">
                            <thead>
                            <tr>
                                <th>{{ __('produk') }}</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orderProducts as $index => $orderProduct)
                                <tr>
                                    <td>
                                        <select name="orderProducts[{{$index}}][product_id]"
                                                wire:model="orderProducts.{{$index}}.product_id"
                                                class="form-control" required>
                                            <option value="">-- {{ __('choose') }} {{ __('product') }} --</option>
                                            @foreach ($allProducts as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }} :  @currency($product->price)
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="orderProducts[{{$index}}][quantity]"
                                               class="form-control"
                                               wire:model="orderProducts.{{$index}}.quantity" />
                                    </td>
                                    <td>
                                        <a href="#" wire:click.prevent="removeProduct({{$index}})">{{ __('delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-secondary"
                                    wire:click.prevent="addProduct">+ {{ __('add') }} {{ __('produk') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br />


            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" >{{ __('close') }}</button>
              <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal" wire:click.prevent="createOrder()">{{ __('save') }}</button>
            </form>
            </div>
          </div>
        </div>
      </div>
</div>
