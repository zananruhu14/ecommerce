<div>
    @include('navbar.navbarwwtp')
    <div class="row mb-3 justify-content-between">
        <div class="col-4">
            <h2 class="font-weight-bolder mb-0">{{ __('summary') }} WWTP dan STP</h2>
        </div>
        <div class="col-4">

        </div>
        <div class="col-4 d-flex justify-content-end">
            <a href="/summaryprint" class="btn bg-gradient-info text-end" target="_blank" >
                <i class="bi bi-printer-fill"></i>
                Print
             </a>
             <button class="btn bg-gradient-success mx-2" wire:click="export">
                <i class="bi bi-file-earmark-excel"></i>
                Excel
             </button>
        </div>

        </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="table-responsive table-bordered">
            <table class="table table-striped table-bordered" id="datatable-search">
                <thead class="table-dark">
                <tr>
                <th rowspan="2" class="text-sm "  style="vertical-align : middle;text-align:center;">{{ __('month') }}</th>
                <th rowspan="2" class="text-sm " style="vertical-align : middle;text-align:center;">WWTP</th>
                <th rowspan="2" class="text-sm " style="vertical-align : middle;text-align:center;">STP</th>
                <th rowspan="2" class="text-sm " style="vertical-align : middle;text-align:center;">Total</th>

                </tr>

                </thead>
                <tbody>

                    @foreach ($grouped as $g)
                    <tr>


                        <td class="text-dark">{{ date("F", mktime(0, 0, 0, $g->month, 10)) }} {{ $g->year }}</td>


                        <td class="text-dark">@currency($g->total_status_1)</td>

                        <td class="text-dark">@currency($g->total_status_2)</td>

                        <td class="text-dark">@currency($g->total)</td>

                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                    <tr class="table-dark">
                        <td class="text-center">Total</td>
                        <td >@currency($total_wwtp->total)</td>
                        <td >@currency($total_stp->total)</td>
                        <td >@currency($grantototal->total)</td>

                    </tr>
                </tfoot>
                </table>

        </div>
        </div>
        </div>
        </div>
</div>
