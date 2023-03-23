<div>
    <div class="row" id="card">
        <div class="col-sm-4">
        <div class="card">
        <div class="card-body p-3 position-relative">
        <div class="row">
        <div class="col-7 text-start">
        <p class="text-sm mb-1 text-capitalize font-weight-bold">{{ __('pruduct_purchase') }}</p>
        <h5 class="font-weight-bolder mb-0">
        {{ $pemasukan_thismonth }} Kg
        </h5>
        @if ($pemasukan_thismonth > $pemasukan_lastmonth)
        <span class="text-sm text-end text-danger font-weight-bolder mt-auto mb-0">+{{ number_format($percentage_change) }}%
        @elseif($pemasukan_thismonth < $pemasukan_lastmonth)
        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">-{{ number_format($percentage_change) }}%
        @endif
        <span class="font-weight-normal text-secondary">{{ __('since_last_month') }}</span></span>
        </div>
        <div class="col-5">
        <div class="dropdown text-end">
        <span class="text-xs text-secondary">{{ date('F') }}</span>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="col-sm-4 mt-sm-0 mt-4">
        <div class="card">
        <div class="card-body p-3 position-relative">
        <div class="row">
        <div class="col-7 text-start">
        <p class="text-sm mb-1 text-capitalize font-weight-bold">{{ __('pemakaian') }} WWTP</p>
        <h5 class="font-weight-bolder mb-0">
        {{ $pemakaianwwtp_thismonth }} Kg
        </h5>
        @if ($pemakaianwwtp_thismonth > $pemakaianwwtp_last_month)
        
        <span class="text-sm text-end text-danger font-weight-bolder mt-auto mb-0">+{{ number_format($percetage_wwtp) }}%
        @elseif($pemakaianwwtp_thismonth < $pemakaianwwtp_last_month)
        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">-{{ number_format($percetage_wwtp) }}%
        @endif
        <span class="font-weight-normal text-secondary">{{ __('since_last_month') }}</span></span>
        </div>
        <div class="col-5">
        <div class="dropdown text-end">
        <span class="text-xs text-secondary">{{ date('F') }}</span>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="col-sm-4 mt-sm-0 mt-4">
        <div class="card">
        <div class="card-body p-3 position-relative">
        <div class="row">
        <div class="col-7 text-start">
        <p class="text-sm mb-1 text-capitalize font-weight-bold">{{ __('pemakaian') }} STP</p>
        <h5 class="font-weight-bolder mb-0">
        {{ $pemakaianstp_thismonth }} Kg
        </h5>
        @if ($pemakaianstp_thismonth > $pemakaianstp_last_month)
        <span class="text-sm text-end text-danger font-weight-bolder mt-auto mb-0">+{{ number_format($percetage_stp) }}%
        @elseif($pemakaianstp_thismonth < $pemakaianstp_last_month)
        <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">-{{ number_format($percetage_stp) }}%
        @endif
        </span> {{ __('since_last_month') }}</span>
        </div>
        <div class="col-5">
        <div class="dropdown text-end">
            <span class="text-xs text-secondary">{{ date('F') }}</span>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
</div>
