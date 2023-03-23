
<div class="row mb-2">
    <div class="col-sm-4">
    <div class="card">
    <div class="card-body p-3 position-relative">
    <div class="row">
    <div class="col-7 text-start">
    <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Cost WWTP</p>
    <h5 class="font-weight-bolder mb-0">
      @currency($total_wwtp->total)
    </h5>
    </div>
    <div class="col-5">
    <div class="dropdown text-end">

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
    <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Cost STP</p>
    <h5 class="font-weight-bolder mb-0">
        @currency($total_stp->total)
    </h5>
    </div>
    <div class="col-5">
    <div class="dropdown text-end">

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
    <p class="text-sm mb-1 text-capitalize font-weight-bold">Grand Total</p>
    <h5 class="font-weight-bolder mb-0">
        @currency($grantototal->total)
    </h5>

    </div>
    <div class="col-5">
    <div class="dropdown text-end">

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<table class="table table-striped table-bordered" id="datatable-search">
    <thead class="thead-light">
    <tr>
    <th rowspan="2" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TANGGAL</th>
    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">INLET WWTP</th>
    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">OUTLET WWTP</th>
    @foreach ($items as $item)

    <th colspan="2"  class="text-center text-sm text-dark">{{ $item->nama_barang }} @currency($item->harga_po)</th>
    @endforeach
    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">COST/HARI</th>
    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">COST/ M³</th>


    </tr>

    <tr>
        @foreach ($items as $item)

        <th class="text-dark">Pemakaian</th>
        <th class="text-dark">Cost</th>
        @endforeach



        </tr>
    </thead>
    <tbody>

        @foreach ($grouped as $g)
        <tr>

            <td
            @if (date('D', strtotime($g['tanggal'])) == 'Sun')
            class="badge bg-gradient-danger item-align-mid "
            @else
            class="badge bg-gradient-success text-center "
            @endif
          >{{ date('d F Y', strtotime($g['tanggal'])) }}</td>
            <td class="text-dark">{{ $g['inlet'] }}</td>
            <td class="text-dark">{{ $g['outlet'] }}</td>
            @php
                $rowTotal = 0;
                $totalqty = 0;
            @endphp
            @foreach ($items as $item)
                <?php
                    $item_wwtp_id = $item->id;
                    $index = array_search($item_wwtp_id, $g['item_wwtp_ids']);
                    $qty = $index !== false ? $g['qtys'][$index] : 0;
                ?>
                <td class="text-dark">{{ $qty }}</td>
                <td class="text-dark">@currency($cost = $qty !== 0 ? $qty * $item->harga_po : 0)</td>
                @php
                    $rowTotal += $cost;
                     $totalCost += $cost;
                @endphp
            @endforeach
            <td class="text-dark"> @currency($rowTotal)</td>
            <td class="text-dark">@currency( $costPerM3 = $rowTotal/$g['outlet'] ) </td>
                    @php
                        $totalCostPerM3 += $costPerM3
                    @endphp


        </tr>
    @endforeach

    </tbody>

    </table>
