<div>
    @include('navbar.navbarwwtp')
    @if (session()->has('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mb-2">
        <div class="col-sm-4">
        <div class="card">
        <div class="card-body p-3 position-relative">
        <div class="row">
        <div class="col-7 text-start">
        <p class="text-sm mb-1 text-capitalize font-weight-bold">{{ __('sum') }} {{ __('price') }} WWTP</p>
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
        <p class="text-sm mb-1 text-capitalize font-weight-bold">{{ __('sum') }} {{ __('price') }} STP</p>
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
        <p class="text-sm mb-1 text-capitalize font-weight-bold">{{ __('grand_total') }}</p>
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
    <div class="d-sm-flex justify-content-between">
        <div>
            <button class="btn btn-block bg-gradient-primary  border-0" data-bs-toggle="modal" data-bs-target="#myModal" >{{ __('add') }} {{ __('pemakaian') }}</button>
        </div>


        <div class="d-flex">
        <div class="dropdown d-inline mx-2  justify-content-end">
            <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
            STP
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
            <li><a class="dropdown-item border-radius-md" href="pemakaian">WWTP</a></li>
            </li>

            </ul>
            </div>
        <div class="d-flex" id="reportrange" >

            <div class="form-group">
                <div class="input-group">


            <h6  class="btn bg-gradient-info dropdown-toggle ">  <i class="fa fa-calendar"></i>&nbsp;{{ date('d F Y', strtotime($start )) }} to {{ date('d F Y', strtotime($end )) }}</h6>
            <a href="/stpprint/{{ $start }}/{{ $end }}" class="btn bg-gradient-info mx-2" target="_blank">
                <i class="bi bi-printer-fill"></i>
                Print
             </a>
             <button class="btn bg-gradient-success mx-2" wire:click="export">
                <i class="bi bi-file-earmark-excel"></i>
                Excel
             </button>
        </div>

    </div>
    </div>


    <div class="d-flex">
        <div class="dropdown d-inline px-2  justify-content-end">
            <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                {{ __('show') }} / {{ __('hide') }} {{ __('produk') }}
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
                @foreach ($allProducts as $column)
                <li>
                    <div class="form-check">
                        <input type="checkbox" wire:model="filter" value="{{$column->id}}" class="form-check-input" >
                        <label class="custom-control-label" >{{$column->nama_barang}}</label>
                      </div>


            </li>
                @endforeach


            </ul>
            </div>




    </div>
    </div>

        </div>
        <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="table-responsive table-bordered">
                <table class="table table-striped table-bordered" id="datatable-search">
                    <thead class="thead-light">
                    <tr>
                    <th rowspan="2" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">{{ __('date') }}</th>
                    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">STP {{ __('out') }} M³</th>
                    @foreach ($items as $item)

                    <th colspan="2"  class="text-center text-sm text-dark">{{ $item->nama_barang }} @currency($item->harga_po)</th>
                    @endforeach
                    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">{{ __('cost') }}/{{ __('day') }}</th>
                    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">{{ __('cost') }}/ M³</th>
                    <th rowspan="2" class="text-sm text-dark" style="vertical-align : middle;text-align:center;">{{ __('option') }}</th>

                    </tr>

                    <tr>
                        @foreach ($items as $item)
                        <th class="text-dark">{{ __('pemakaian') }}</th>
                        <th class="text-dark">{{ __('cost') }}</th>
                        @endforeach



                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($grouped as $g)
                        <tr>

                            <td
                            @if (date('D', strtotime($g['tanggal'])) == 'Sun')
                            class="badge bg-gradient-danger item-align-mid"
                            @else
                            class="badge bg-gradient-success text-center"
                            @endif
                          >{{ date('d F Y', strtotime($g['tanggal'])) }}</td>
                            <td class="text-dark">{{ $g['stp'] }}</td>
                            @php
                                $rowTotal = 0;
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
                                @endphp
                            @endforeach
                            <td class="text-dark"> @currency($rowTotal)</td>
                            <td class="text-dark">@currency( $costPerM3 = $rowTotal/$g['stp']) </td>
                            <td><button wire:click="sendData('{{ $g['tanggal'] }}')" class="badge bg-gradient-danger"> {{ __('delete') }} </button></td>

                        </tr>
                    @endforeach

                    </tbody>

                    </table>

            </div>
            </div>
            </div>
            </div>

            <div wire:ignore.self  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="edit-notification" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> Form</h5>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editStudentData">
                        @csrf

                        <div class="row">
                            <div class="col-md-7">
                        <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                            {{ __('date') }}
                            <input type="date" name="birthday" class="form-control"
                                    required wire:model="date">
                            @if($errors->has('birthday'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('birthday') }}
                                </em>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('outlet') ? 'has-error' : '' }}">
                            STP {{ __('out') }}
                            <input type="number" name="outlet" class="form-control"
                                   value="{{ old('outlet') }}" wire:model="stp" required>
                            @if($errors->has('outlet'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('outlet') }}
                                </em>
                            @endif
                        </div>
                    </div>
                </div>

                        <div class="card">
                            <div class="card-header">
                                {{ __('produk') }}
                            </div>

                            <div class="card-body">
                                <table class="table" id="products_table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('produk') }}</th>
                                        <th>Quantity / Kg</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orderProducts as $index => $orderProduct)
                                        <tr>
                                            <td>
                                                <select name="orderProducts[{{$index}}][product_id]"
                                                        wire:model="orderProducts.{{$index}}.product_id"
                                                        class="form-control" required>
                                                        <option value="">-- {{ __('choose') }} {{ __('product') }} --</option>
                                                    @foreach ($allProducts as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->nama_barang }} {{ __('price') }}  : {{ $product->harga_po }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="orderProducts[{{$index}}][quantity]"
                                                       class="form-control"
                                                       wire:model="orderProducts.{{$index}}.quantity" />
                                            </td>
                                            <td>
                                                <a href="#" wire:click.prevent="removeProduct({{$index}})">{{ __('delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-secondary"
                                            wire:click.prevent="addProduct">+  {{ __('add') }} {{ __('produk') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">{{ __('close') }}</button>
                      <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal" wire:click.prevent="save()">{{ __('save') }}</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>

              <div wire:ignore.self  class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit-notification" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        @if(isset($edit_id))
                        <form wire:submit.prevent="editStudentData">
                        @csrf

                        <div class="row">
                            <div class="col-md-7">
                        <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                            {{ __('date') }}


                            <input type="date" name="birthday" class="form-control"
                                    required value="{{ $edit_id->tanggal }}" wire:model="edit_tanggal">
                            @if($errors->has('birthday'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('birthday') }}
                                </em>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('outlet') ? 'has-error' : '' }}">
                            STP   {{ __('out') }}
                            <input type="number" name="outlet" class="form-control"
                                   value="{{ $edit_id->outlet }}"  required wire:model="edit_outlet">
                            @if($errors->has('outlet'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('outlet') }}
                                </em>
                            @endif
                        </div>
                    </div>
                </div>

                        <div class="card">
                            <div class="card-header">
                                {{ __('produk') }}
                            </div>

                            <div class="card-body">
                                <table class="table" id="products_table">
                                    <thead>
                                    <tr>
                                        <th>                {{ __('produk') }}</th>
                                        <th>Quantity / Kg</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orderProducts as $index => $orderProduct)
                                        <tr>
                                            <td>
                                                <select name="orderProducts[{{$index}}][product_id]"
                                                        wire:model="orderProducts.{{$index}}.product_id"
                                                        class="form-control" required>
                                                    <option value="">-- {{ __('choose') }} {{ ("produk") }} --</option>
                                                    @foreach ($allProducts as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->nama_barang }} {{ __('price') }} : {{ $product->harga_po }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="orderProducts[{{$index}}][quantity]"
                                                       class="form-control"
                                                       wire:model="orderProducts.{{$index}}.quantity" />
                                            </td>
                                            <td>
                                                <a href="#" wire:click.prevent="removeProduct({{$index}})">{{ __('delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-secondary"
                                            wire:click.prevent="addProduct">+ {{ __('add') }} {{ __('produk') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancelEdit()">{{ __('close') }}</button>
                      <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal" wire:click.prevent="saveEdit()">{{ __('save') }}</button>
                    </form>
                    @endif
                    </div>
                  </div>
                </div>
              </div>


              <script>
                $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {

            window.livewire.emit('tanggalPemakaian', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

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
