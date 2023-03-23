<div>

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Success!</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row">
    <div class="col-lg-12 col-12 mt-4 mt-lg-0">
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
          <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $cart->acce_name }},   Order qty : {{ $cart->acce_qty }} {{ $cart->acce_unit }}</h6>
          <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $cart->acce_spec }}</h6>
          <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $cart->aacce_desc }}</h6>
          <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{  now()->toDateTimeString() }}</p>

          <button class="btn btn-block bg-danger text-light btn-sm  border-0" wire:click="remove({{ $cart->id }})">Remove</button>
          {{-- <span class="badge badge-sm bg-gradient-info">Payments</span> --}}
          </div>
          </div>
          @endforeach
      </div>
      @if ($prod->count())
      <button type="button" class="btn btn-primary btn-lg w-100" wire:click="checkout()">Save</button>
      @endif

          </div>
          </div>
      </div>
</div>
</div>
