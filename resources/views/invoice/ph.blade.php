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
                                <a href="" onclick=" window.print(); " target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                </div>
                            <!-- /.col -->
                          </div>
                          <hr id="cok" >

                          @if ($jenis == 1)
                          <h4 class="text-bold text-center mb-4">WWTP INTERNAL DAILY TEST</h4>
                          @else
                          <h4 class="text-bold text-center mb-4">STP INTERNAL DAILY TEST</h4>
                          @endif



                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12">
                            <div class="card">
                            <div class="table-responsive table-bordered">
                                <table class="table table-striped table-bordered" id="datatable-search">
                                    <thead class="thead-light">
                                    <tr>
                                    <th rowspan="3" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TANGGAL</th>
                                    <th rowspan="3" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">SHIFT</th>

                                    </tr>
                                    <tr>
                                        <th rowspan="1" colspan="10" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">PARAMETER</th>

                                    </tr>

                                    <tr>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">COD</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">BOD <sup>5</sup></th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TDS</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TSS</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">COLOR</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">DO</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">SV30</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">PH</th>
                                        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TEMPERATUR</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($group as $g)


                                                <tr >
                                                    <td rowspan="2" style="vertical-align : middle;text-align:center;" class="bg-success">

                                                       {{ date('d F Y', strtotime($g)) }}

                                                    </td>



                                                    @foreach ($cekph1 as $d)
                                                    @if ($g == $d->tanggal)
                                                    <td>{{ $d->shift }}</td>
                                                    <td >{{ number_format($d->cod, 1) }} </td>
                                                    <td >{{ number_format($d->bod, 1) }}</td>
                                                    <td >{{ number_format($d->tds, 1) }}</td>
                                                    <td >{{ number_format($d->tss, 1) }}</td>
                                                    <td >{{ number_format($d->color, 1) }}</td>
                                                    <td >{{ number_format($d->do, 1) }}</td>
                                                    <td >{{ number_format($d->sv30, 1) }}</td>
                                                    <td id="ph{{ intval($d->qty) }}">{{ number_format($d->qty, 1) }}</td>
                                                    <td >{{ number_format($d->temperatur, 1) }}</td>

                                                    @endif
                                                    @endforeach


                                                </tr>
                                                <tr >

                                                    @foreach ($cekph2 as $p)
                                                    @if ($g == $p->tanggal)
                                                  <td>{{ $p->shift }}</td>
                                                    <td >{{ number_format($p->cod, 1) }} </td>
                                                    <td >{{ number_format($p->bod, 1) }}</td>
                                                    <td >{{ number_format($p->tds, 1) }}</td>
                                                    <td >{{ number_format($p->tss, 1) }}</td>
                                                    <td >{{ number_format($p->color, 1) }}</td>
                                                    <td >{{ number_format($p->do, 1) }}</td>
                                                    <td >{{ number_format($p->sv30, 1) }}</td>
                                                    <td id="ph{{ intval($p->qty) }}">{{ number_format($p->qty, 1) }}</td>
                                                    <td >{{ number_format($p->temperatur, 1) }}</td>

                                                    @endif
                                                    @endforeach
                                                </tr>



                                        @endforeach


                                    </tbody>

                                    </table>

                            </div>
                            </div>
                            </div>
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
