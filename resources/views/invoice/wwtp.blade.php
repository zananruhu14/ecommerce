@extends('layout.app')

@section('content')
    <div id="app">
        <div class="row">
                <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-1">
                            <img src="/ltx/img/leetex_logo-removebg-preview.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-8 justify-content-start">
                               <H1>PT. Leetex Garmen Indonesia</H1><br>
                               <h5> Jalan Raya Bandung Cirebon Desa SinarJati, Kec. Dawuan, Kabupaten Majalengka, Jawa Barat 45453</h5>

                                </div>
                            <div class="col-3 justify-content-end">
                                <a href="/pemakaian"  class="btn btn-default"><i class="fa fa-print"></i> Back</a>
                                <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                </div>
                            <!-- /.col -->
                          </div>
                          <hr id="cok" >
                          <h4 class="text-bold text-center mb-4">PEMAKAIAN WWTP</h4>
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
                            <span class="text-xs text-secondary">{{ date('d F Y', strtotime($start)) }} - {{ date('d F Y', strtotime($end)) }}</span>
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
                            <span class="text-xs text-secondary">{{ date('d F Y', strtotime($start)) }} - {{ date('d F Y', strtotime($end)) }}</span>
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
                                <span class="text-xs text-secondary">{{ date('d F Y', strtotime($start)) }} - {{ date('d F Y', strtotime($end)) }}</span>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>

                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="text-sm"  style="vertical-align : middle;text-align:center;">TANGGAL</th>
                                    <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">INLET WWTP</th>
                                    <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">OUTLET WWTP</th>
                                    @foreach ($items as $item)

                                    <th colspan="2"  class="text-center text-sm">{{ $item->nama_barang }} @currency($item->harga_po)</th>
                                    @endforeach
                                    <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">COST/HARI</th>
                                    <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">COST/ M³</th>

                                </tr>
                                <tr>
                                    @foreach ($items as $item)

                                    <th>Pemakaian</th>
                                    <th>Cost</th>
                                    @endforeach



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grouped as $g)
                                    <tr>

                                        <td
                                        @if (date('D', strtotime($g['tanggal'])) == 'Sun')
                                        class="bg-danger"
                                        @else
                                        class="bg-success"
                                        @endif
                                      >{{ date('d F Y', strtotime($g['tanggal'])) }}</td>
                                        <td>{{ $g['inlet'] }}</td>
                                        <td>{{ $g['outlet'] }}</td>
                                        @php
                                            $rowTotal = 0;
                                        @endphp
                                        @foreach ($items as $item)
                                            <?php
                                                $item_wwtp_id = $item->id;
                                                $index = array_search($item_wwtp_id, $g['item_wwtp_ids']);
                                                $qty = $index !== false ? $g['qtys'][$index] : 0;
                                            ?>
                                            <td>{{ $qty }}</td>
                                            <td> @currency($cost = $qty !== 0 ? $qty * $item->harga_po : 0)</td>
                                            @php
                                                $rowTotal += $cost;
                                            @endphp
                                        @endforeach
                                        <td> @currency($rowTotal)</td>
                                        <td>@currency($rowTotal/$g['outlet'])</td>
                                    </tr>
                                @endforeach
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
<hr style="height: 50px;">

                          <!-- /.row -->

                          <!-- this row will not appear when printing -->


                        </div>
                        <!-- /.invoice -->



                      </div>


        </div>
    </div>


@endsection
