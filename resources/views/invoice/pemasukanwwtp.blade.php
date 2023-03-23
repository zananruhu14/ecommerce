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
                                <a href="/wwtp/barang-masuk"  class="btn btn-default"><i class="fa fa-print"></i> Back</a>
                                <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                </div>
                            <!-- /.col -->
                          </div>
                          <hr id="cok" >
                          <h4 class="text-bold text-center mb-4">Pemasukan WWTP dan STP</h4>

                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-flush" id="datatable-search">
                                    <thead class="thead-light">
                                    <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Stock Awal</th>
                                    <th>Pemasukan</th>
                                    <th>Pemakaian</th>
                                    <th>Stock Akhir</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>
                                        <div class="d-flex align-items-center">
                                        <h6 class="text-xs font-weight-bold ms-2 mb-0">{{ $loop->iteration }}</h6>
                                        </div>
                                        </td>
                                        <td class="font-weight-bold">
                                        <h6 class="my-2 text-xs">{{ $item->nama_barang }}</h6>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                        <div class="d-flex align-items-center">

                                        <h6>@currency($item->harga_po) / Kg</h6>
                                        </div>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                        <div class="d-flex align-items-center">
                                            @if ($item->status == 1)
                                            <h6 class="badge badge-success badge-sm">WWTP</h6>
                                            @else
                                            <h6 class="badge badge-info badge-sm">STP</h6>
                                            @endif


                                        </div>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            {{-- @foreach ($item->po_wwtp as $po)
                                            <h6 class="my-2 text-xs"> {{ $po->first()->qty_po }}</h6>
                                            @endforeach --}}
                                            <h6 class="my-2 text-xs"> {{ $item->po_wwtp->first()->qty_po  }}</h6>


                                        </td>
                                        <td class="text-xs font-weight-bold">
                                        <h6 class="my-2 text-xs">{{ $item->total_qty}} Kg</h6>
                                        </td>
                                        <td class="text-xs font-weight-bold">
                                            <h6 class="my-2 text-xs">{{ $item->total_pemakaian }} Kg</h6>
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <h6 class="my-2 text-xs">{{ $item->total_qty -  $item->total_pemakaian}} Kg</h6>
                                                </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                    </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->


                          <!-- this row will not appear when printing -->


                        </div>
                        <!-- /.invoice -->



                      </div>


        </div>
    </div>


@endsection
