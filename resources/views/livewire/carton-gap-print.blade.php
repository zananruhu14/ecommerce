<div>
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
              <a href="/carton-gap"  class="btn btn-default"><i class="fa fa-print"></i> Back</a>
              <a href="" onclick=" window.print(); " target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              </div>
          <!-- /.col -->
        </div>
<div class="row">
    <div class="col-8">

        <div class="col-12 col-md-12 col-xl-12 mt-md-0 mt-4 mb-2">
            <div class="card h-100">
            <div class="card-header pb-0 p-3">
            <div class="row">
            <div class="col-md-8 d-flex align-items-center">
            <h6 class="mb-0">Kebutuhan Karton</h6>
            </div>
            <div class="col-md-4 text-end">

            </div>
            </div>
            </div>
            <div class="card-body p-3">

            <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">IDP:</strong> &nbsp; @foreach ($idp as $i)
    {{ $i }}
            @endforeach</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">STYLE NO.:</strong> &nbsp; {{ $style }}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">BUYER:</strong> &nbsp; {{ $buyer }}</li>
            <li class="list-group-item border-0 ps-0 pb-0">
            </li>
            </ul>
            </div>
            </div>
            </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datatable-search">
            <thead class="table-dark">
                <tr>
                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">PO CUST</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">IDP</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">UKURAN KARTON</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">KEBUTUHAN</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">READY/NOT</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">NEGARA</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">ITEM NO.</th>

                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">TOD</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">NO. PL</th>





                </tr>
              </thead>
              <tbody>
           @foreach ($grouped_items as $item)
                      <tr>

                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                    @foreach ($item['xCustNo'] as $po)
                                    {{ $po }}<br>
                                @endforeach
                            </h6>
                                  </div>
                                </div>
                              </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @foreach ($item['xPO'] as $po)
                                        {{ $po }}<br>
                                    @endforeach


                                    </h6>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap text-center">

                                        {{  $item['xBoxCode']  }} <br>{{ number_format($item['xLength'], 2, '.', '') }}x{{ number_format($item['xWidth'], 2, '.', '') }}x{{ number_format($item['xHeight'], 2, '.', '') }}
                    </h6>
                                  </div>
                                </div>
                              </td>

                              <td class="text-center">
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">{{ $item['cnt'] }}</h6>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @php
                                        if(isset($item['xLength']) && isset($item['xWidth']) && isset($item['xHeight'])) {
                                            $xL = floatval($item['xLength']);
                                            $xW = floatval($item['xWidth']);
                                            $xH = floatval($item['xHeight']);
                                            $matched = false;
                                            {
                                                foreach ($cek as $spec) {
                                                    if (!empty($spec['xLength'])) {
                                                        if (number_format($xL, 2, '.', '') == number_format($spec['xLength'], 2, '.', '') &&
                                                    number_format($xW, 2, '.', '') == number_format($spec['xWidth'], 2, '.', '') &&
                                                    number_format($xH, 2, '.', '') == number_format($spec['xHeight'], 2, '.', '')) {
                                                    echo "Ready";
                                                    $matched = true;
                                                    break;
                                                }
                                                    }

                                            }
                                            if (!$matched) {
                                                echo "not Ready" ;
                                            }
                                                # code...
                                            }

                                        }
                                        @endphp

                                        </h6>
                                        </div>
                                        </div>
                                        </td>

                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">  @foreach ($item['xRegion'] as $po)
                                        {{ $po }}<br>
                                    @endforeach

                                    </h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        {{-- @foreach ($item['ItemCode'] as $po)
                                        {{ $po }}<br>
                                    @endforeach --}}

                                    </h6>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @foreach ($item['shpt'] as $po)
                                      {{date('d-m-Y', strtotime($po ))}} <br>
                                    @endforeach

                                    </h6>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @foreach ($item['sNumber'] as $po)
                                        {{ $po }}<br>
                                    @endforeach
                                    </h6>
                                  </div>
                                </div>
                              </td>



                        </tr>
              @endforeach
              <tfoot  class="table-dark">
                <tr>
                  <td class="text-center" colspan="3">Total</td>
                  <td class=" text-bold" >{{ $total }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>

                  </tbody>
                  </table>
                </div>
    </div>



    <div class="col-4">
        <div class="card">
            <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
            <h6 class="mb-0">Stock Carton {{ $buyer }} </h6>
            </div>
            </div>
            <div class="card-body p-3">
            <ul class="list-group list-group-flush list my--3">

                @foreach ($grouped_stock as $s)
                <li class="list-group-item px-0 border-0">
                    <div class="row align-items-center">

                    <div class="col">
                    <p class="text-xs font-weight-bold mb-0">Size:</p>
                    <h6 class="text-xs mb-0">{{ $s['size'] }}</h6>
                    </div>
                    <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">IDP:</p>
                    <h6 class="text-xs text-wrap mb-0">
                    @foreach ($s['xPO'] as $i)
                        {{ $i }} <br>
                    @endforeach

                    </h6>
                    </div>
                    <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Stock:</p>
                    <h6 class="text-xs  text-wrap mb-0">{{ $s['total'] }}</h6>
                    </div>
                    <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">PO:</p>
                    <h6 class="text-xs text-wrap mb-0">
                        @foreach ($s['xBuyNo'] as $i)
                        {{ $i }} <br>
                    @endforeach
                    </h6>
                    </div>

                    </div>
                    <hr class="horizontal dark mt-3 mb-1">
                    </li>
                @endforeach



            </ul>
            </div>
            </div>
    </div>
</div>

</div>
