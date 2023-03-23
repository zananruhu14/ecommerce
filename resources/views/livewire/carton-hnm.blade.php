<div>
    @include('navbar.navbarcarton')
    <div class="row my-3 justify-content-between">

        <div class="d-flex" id="reportrange" >




            <h6  class="btn bg-gradient-info dropdown-toggle ">  <i class="fa fa-calendar"></i>&nbsp;{{ date('d F Y', strtotime($start )) }} to {{ date('d F Y', strtotime($end )) }}</h6>
            <a href="/hnmprint/{{ $start }}/{{ $end }}" class="btn bg-gradient-info mx-2" target="_blank">
                <i class="bi bi-printer-fill"></i>
                Print
             </a>
        </div>

        {{-- <div class="col3">
            <a href="/cartongapprint/{{ $search }}" class="btn bg-gradient-info mx-2" target="_blank">
                <i class="bi bi-printer-fill"></i>
                Print
             </a>
        </div> --}}
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
            {{-- <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">IDP:</strong> &nbsp; @foreach ($idp as $i)
    {{ $i }}
            @endforeach</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">STYLE NO.:</strong> &nbsp; {{ $style }}</li> --}}
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
<script>
    $(function() {

var start = moment().subtract(29, 'days');
var end = moment();

function cb(start, end) {

window.livewire.emit('cartonTod', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

}




$('#reportrange').daterangepicker({
startDate: start,
endDate: end,
ranges: {
   'Today': [moment(), moment()],
   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
   'This Month': [moment().startOf('month'), moment().endOf('month')],
   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
}
}, cb);

cb(start, end);

});



</script>
</div>
