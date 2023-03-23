<div>

    @include('livewire.navbar_warehouse')
    @if (session()->has('message'))
          <div class="alert alert-success text-center">{{ session('message') }}</div>
      @endif
  <div class="row mt-4">
      <div class="col-lg-9 col-12">
       <div class="card">
      <div class="card-header p-3">
      <div class="row">
      <div class="col-md-6">
      <h6 class="mb-0">Form Order</h6>
      </div>
      <div class="col-md-6 d-flex justify-content-end align-items-center">
      <small>{{  now()->toDateTimeString() }}</small>
      </div>
      </div>
      <hr class="horizontal dark mb-0">
      </div>
      <div class="card-body p-3 pt-0">
      <ul class="list-group list-group-flush" data-toggle="checklist">
      <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
      <div class="checklist-item checklist-item-primary ps-2 ms-3">
      <div class="d-flex align-items-center">


      <div class="dropstart float-lg-end ms-auto pe-0">

      </div>
      </div>
      <div class="row">
          <div class="col-4">
              <div class="form-group">
                  <h6 class="mb-0 text-dark font-weight-bold text-sm mb-2">Diminta Oleh</h6>
                  <input class="form-control" id="exampleFormControlTextarea1" rows="3" required wire:model="nama_peminta"></input>
                </div>
          </div>
          <div class="col-4">

                <div class="form-group">
                  <h6 class="mb-0 text-dark font-weight-bold text-sm mb-2">Lokasi Penggunaan</h6>
                  <input class="form-control" id="exampleFormControlTextarea1" rows="3" required wire:model="lokasi"></input>
                </div>
          </div>
      </div>

           <div class="row">
              <div class="form-group">
                  <h6 class="mb-0 text-dark font-weight-bold text-sm mb-2">Tujuan Permintaan</h6>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required wire:model="keterangan"></textarea>
                </div>
          </div>
      </div>
      <hr class="horizontal dark mt-4 mb-0">
      </li>
      <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
      <div class="checklist-item checklist-item-dark ps-2 ms-3">
      <div class="d-flex align-items-center">
      <h6 class="mb-0 text-dark font-weight-bold text-sm mb-3">Item List</h6>

      </div>
      <div class="form-group">
          <div class="input-group input-group-sm">
            <input type="text" wire:model='po' class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Cari" autofocus>
          </div>
      </div>

  {{-- foreac --}}
  <table class="table table-striped table-sm mb-0">
      <thead>
        <tr>

          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Spec</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desc</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Qty</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($items as $item)
              <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <span class="mb-0 text-sm">{{ $item['_Acce_Name'] }}</span>
                        </div>
                      </div>
                    </td>
                    <td style="max-width: 300px ; overflow-x:scroll">
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <span class="mb-0 text-sm">{{ $item['xSpec'] }}</span>
                        </div>
                      </div>
                    </td>
                    <td style="max-width: 300px ; overflow-x:scroll">
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <span class="mb-0 text-sm">{{ $item['xDesc'] }}</span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $item['xtQty'] }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                              <input type="number" wire:model="quantity.{{  $item['sIndex'] }}"
                              class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                              style="width: 50px" />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <button type="submit" class="btn btn-block bg-gradient-info btn-sm  border-0" wire:click="addToCart({{ $item['sIndex'] }})" >Add</button>
                        </div>
                      </div>
                    </td>
                </tr>
      @endforeach

          </tbody>
          </table>
          {{ $items->withQueryString()->links() }}
              {{-- {{ $items->links() }} --}}
      {{-- endforec --}}

      </div>

      </li>

      </ul>
      </div>
      </div>





  </div>
  {{-- @livewire('cart-counter') --}}

  <div class="col-lg-3 col-12 mt-4 mt-lg-0">
      <div class="card">
          <div class="card-header pb-0">
          <h6>Order Item</h6>
          </div>
          <div class="card-body p-3">
          <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">
              @foreach ($prod as $cart)
          <div class="timeline-block mb-3">
          <span class="timeline-step">
          <i class="ni ni-cart text-info text-gradient"></i>
          </span>
          <div class="timeline-content">
          <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $cart->name }},   Order qty : {{ $cart->quantity }}</h6>
          <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $cart->attributes->spec }}</h6>
          <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $cart->attributes->desc }}</h6>
          <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{  now()->toDateTimeString() }}</p>
          <p class="text-sm mt-3 mb-2">
          {{ $keterangan }}
          </p>
          <p class="text-sm mt-3 mb-2">
             Lokasi : {{ $lokasi }}
              </p>
          <button class="btn btn-block bg-danger text-light btn-sm  border-0" wire:click="remove({{ $cart->id }})">Remove</button>
          {{-- <span class="badge badge-sm bg-gradient-info">Payments</span> --}}
          </div>
          </div>
          @endforeach
      </div>
      <button type="button" class="btn btn-primary btn-lg w-100" wire:click="checkout()">Save</button>
          </div>
          </div>
      </div>
</div>
</div>
