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
                                <a href="/gudang/order"  class="btn btn-default"><i class="fa fa-print"></i> Back</a>
                                <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                </div>
                            <!-- /.col -->
                          </div>
                          <hr id="cok" >
                          <h4 class="text-bold text-center mb-4">NOTA PENYERAHAN BARANG</h4>
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">

                              <address>

                                <strong>Peminta :</strong> <span class="text-end">{{ $npbs->user->name }}</span><br>
                                <strong>Nik :</strong> {{ $npbs->user->nik }}<br>
                                <strong>Departemen :</strong> {{ $npbs->user->departemen }}<br>

                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col MB-2">

                              <address>
                                <strong>Nota Penerimaan Barang : </strong> {{ !empty($npbs->npb_id) ? $npbs->npb_id : ''}}<br>
                                <strong>No. SJ: </strong> {{ !empty($npbs->no_sj) ? $npbs->no_sj : ''}}<br>

                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <strong>No. Form :</strong> #{{ $npbs->id }}<br>
                                <strong>Tanggal :</strong> {{ $npbs->created_at->isoFormat('dddd, D MMMM Y') }}<br>

                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Spec</th>
                                  <th>Desc</th>
                                  <th>PO</th>
                                  <th>IDP</th>
                                  <th>Buyer</th>
                                  <th>Qty</th>
                                  <th>Unit</th>
                                  <th>Warehouse</th>
                                  <th>Location</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($npbs->item as $form)
                                    <tr>
                                        <td>{{ $form->acce_name }}</td>
                                        <td>{{ $form->acce_spec }}</td>
                                        <td>{{ $form->acce_desc }}</td>
                                        <td>{{ $form->acce_po }}</td>
                                        <td>{{ $form->acce_idp }}</td>
                                        <td>{{ $form->acce_supplier }}</td>
                                        <td>{{ $form->acce_qty }}</td>
                                        <td>{{ $form->acce_unit }}</td>
                                        <td>{{ $form->acce_warehouse }}</td>
                                        <td>{{ $form->acce_warehouse_detail }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
<hr style="height: 50px;">
                          <div class="row justify-content-between">
                            <!-- accepted payments column -->

                            <div class="col-3 ml-5">
                                <p class="lead">Kabag</p>
                                <img class="lead" style="max-height: 80px; max-width:180px;" src="{{ !empty($kabag->image) ? asset('storage/' . $kabag->image) : '' }}" alt="">
                                <br><br>
                                {{ !empty($kabag->name) ? $kabag->name : ''}}
                            </div>


                            <!-- /.col -->

                            <div class="col-3">
                              <p class="lead">Admin</p>
                              <img class="lead" style="max-height: 80px; max-width:180px;" src="{{ asset('storage/' . $npbs->npb->user->image) }}" alt="">
                                <br><br>
                              {{ $npbs->npb->user->name }}

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
