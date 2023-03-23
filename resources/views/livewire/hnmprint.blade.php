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
              <a href="/carton-hnm"  class="btn btn-default"><i class="fa fa-print"></i> Back</a>
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
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">BUYER:</strong> &nbsp; H&M</li>
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
                         <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">Ukuran</th>
                         <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">Assort/Solid</th>
                         <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">Kebutuhan</th>
                         <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">Ready / Not</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ukuranJumlah as $ukuran => $jumlah)
                    @if ($jumlah !== 0 && $ukuran !== 0)

                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="my-2 text-xs text-wrap">
                                    {{ $ukuran }}
                                </h6>
                              </div>
                            </div>
                          </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="my-2 text-xs text-wrap">
                                    Assort
                                </h6>
                              </div>
                            </div>
                          </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="my-2 text-xs text-wrap">
                                    {{ $jumlah }}
                                </h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @php
                                        $matched = false;

                                        foreach ($formattedSpecs as $spec) {
                                            if ($ukuran == $spec) {
                                                echo "Ready";
                                                $matched = true;
                                                break;
                                            }
                                        }

                                        if (!$matched) {
                                            echo "not Ready";
                                        }
                                        @endphp
                                    </h6>
                                </div>
                            </div>
                        </td>

                    </tr>

                    @endif

                    @endforeach
                    @foreach ($ukuranSolid as $ukuran => $jumlah)
                    @if ($jumlah !== 0 && $ukuran !== 0)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="my-2 text-xs text-wrap">
                                    {{ $ukuran }}
                                </h6>
                              </div>
                            </div>
                          </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="my-2 text-xs text-wrap">
                                   Solid
                                </h6>
                              </div>
                            </div>
                          </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="my-2 text-xs text-wrap">
                                    {{ $jumlah }}
                                </h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @php
                                        $matched = false;

                                        foreach ($solid as $spec) {
                                            if ($ukuran == $spec) {
                                                echo "Ready";
                                                $matched = true;
                                                break;
                                            }
                                        }

                                        if (!$matched) {
                                            echo "not Ready";
                                        }
                                        @endphp
                                    </h6>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach

                </tbody>
                <tfoot class="table-dark">
<tr>
    <td colspan="2"></td>
    <td>{{ $count }}</td>
    <td></td>
</tr>
                </tfoot>
            </table>
                </div>
    </div>




    <div class="col-4">
        <div class="card">
            <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
            <h6 class="mb-0">Stock Carton H&M </h6>
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
