<div>
@include('navbar.navbarwwtp')

    @if (session()->has('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
@endif



    <div class="d-sm-flex justify-content-between">
        <div>
            <button class="btn btn-block bg-gradient-primary  border-0" data-bs-toggle="modal" data-bs-target="#newProduct" >{{ __('new_product') }}</button>
        </div>

        <div class="d-flex">
<a class="btn-inner--text" href="printpemasukanwwtp" target="_blank">
        <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
        <span class="btn-inner--icon"><i class="bi bi-printer-fill"></i></span>
        Print
        </button>
        </a>
        </div>

        </div>
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="table-responsive">
        <table class="table table-flush" id="datatable-search">
        <thead class="thead-light">
        <tr>
        <th class="text-dark">No.</th>
        <th class="text-dark">{{ __('produk') }}</th>
        <th class="text-dark">{{ __('price') }}</th>
        <th class="text-dark">{{ __('type') }}</th>
        <th class="text-dark">{{ __('first_stock') }}</th>
        <th class="text-dark">{{ __('in') }}</th>
        <th class="text-dark">{{ __('pemakaian') }}</th>
        <th class="text-dark">{{ __('last_stock') }}</th>
        <th class="text-dark">{{ __('option') }}</th>
        <th class="text-dark">{{ __('option') }}</th>
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
            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
            <h6>@currency($item->harga_po) / Kg</h6>
            </div>
            </td>
            <td class="text-xs font-weight-bold">
            <div class="d-flex align-items-center">
                @if ($item->status == 1)
                <h6 class="badge badge-success badge-sm">WWTP</h6>
                @elseif ($item->status == 3)
                <h6 class="badge badge-primary badge-sm">WWTP dan STP</h6>
                @else
                <h6 class="badge badge-info badge-sm">STP</h6>
                @endif


            </div>
            </td>
            <td class="text-xs font-weight-bold">
                {{-- @foreach ($item->po_wwtp as $po)
                <h6 class="my-2 text-xs"> {{ $po->first()->qty_po }}</h6>
                @endforeach --}}
                <h6 class="my-2 text-xs"> {{ $item->po_wwtp->first() ? $item->po_wwtp->first()->qty_po : 0 }}</h6>


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
            <td class="text-xs font-weight-bold">

                <button class="btn btn-block bg-gradient-success  border-0" data-bs-toggle="modal" data-bs-target="#addProduct"  wire:click="addStock({{ $item->id }})">   <i class="ni ni-fat-add text-secondary"></i>{{ __('add') }} {{ __('stock') }}</button>
            </td>
            <td class="text-xs font-weight-bold">
                <a  data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                    <i class="fas fa-eye text-secondary"  data-bs-toggle="modal" data-bs-target="#view" wire:click="viewProduct({{ $item->id }})"></i>
                     </a>
                    <a  class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                    <i class="fas fa-user-edit text-secondary"  data-bs-toggle="modal" data-bs-target="#editProduct" wire:click="editProduct({{ $item->id }})"></i>
                    </a>

            </td>
            </tr>
        @endforeach


        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>


        <div wire:ignore.self  class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ __('create') }} Form </h5>
                  <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="text-gradient text-danger mt-4">Form {{ __('add') }} {{ __('stock') }}</h4>
                        <p>{{ __('silahkan_isi_form') }}</p>
                      </div>
                  <form  wire:submit.prevent="tambahStock()">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Qty Kg</label>
                        <input type="number" class="form-control" id="exampleFormControlInput2" name="qty" placeholder="{{ __('input') }} qty" wire:model="qty" required>
                        <label for="exampleFormControlInput2">No. PO</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="no_po" placeholder="{{ __('input') }} No. PO" wire:model="no_po" >
                    </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancelTambah()">{{ __('close') }}</button>
                  <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">{{ __('save') }}</button>
                </form>
                </div>
              </div>
            </div>
          </div>


        <div wire:ignore.self  class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Buat Form</h5>
                  <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="text-gradient text-danger mt-4">Form {{ __('new_product') }}</h4>
                        <p>{{ __('silahkan_isi_form') }}</p>
                      </div>
                  <form  wire:submit.prevent="newStock()">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput2">{{ __('produk') }}</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="nama_barang" placeholder="Masukan Nama Barang" wire:model="nama_barang" required>
                        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
                        <label for="exampleFormControlInput2">{{ __('price') }} / Kg</label>
                        <input type="number" class="form-control" id="exampleFormControlInput2" name="harga" placeholder="Masukan Harga" wire:model="harga" required>
                        @error('harga') <span class="text-danger error">{{ $message }}</span>@enderror
                        <label for="exampleFormControlInput2">Qty</label>
                        <input type="number" class="form-control" id="exampleFormControlInput2" name="qty" placeholder="Masukan qty" wire:model="qty" required>
                        @error('qty') <span class="text-danger error">{{ $message }}</span>@enderror
                        <label for="exampleFormControlInput2">{{ __('type') }}</label>
                        <select  class="form-control" wire:model="status_wwtp">
                            <option value="1" selected>WWTP</option>
                            <option value="2">STP</option>
                            <option value="3">WWTP DAN STP</option>
                        </select>

                        <label for="exampleFormControlInput2">No. PO</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="no_po" placeholder="{{ __('input') }} No. PO" wire:model="no_po" >
                        @error('no_po') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel_po()">{{ __('close') }}</button>
                  <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">{{ __('save') }}</button>
                </form>
                </div>
              </div>
            </div>
          </div>


          <div wire:ignore.self  class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                  <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="text-gradient text-danger mt-4">Form {{ __('product') }}</h4>
                        <p>{{ __('silahkan_isi_form') }}</p>
                      </div>
                  <form  wire:submit.prevent="editStock()">
                    @csrf




                    <div class="form-group">
                        <label for="exampleFormControlSelect1">{{ __('produk') }}</label>
                        <input type="text" class="form-control"  wire:model="barang_nama_barang">
                        <label for="exampleFormControlSelect1">{{ ('price') }}</label>
                        <input type="number" class="form-control"  wire:model="barang_harga">
                        <label for="exampleFormControlSelect1">{{ __('type') }}</label>
                        <select class="form-control" id="exampleFormControlSelect1" wire:model="status">
                          <option value="">Pilih</option>
                            <option value="1">WWTP</option>
                          <option value="2">STP</option>
                          <option value="3">WWTP DAN STP</option>
                        </select>
                      </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">{{ 'close' }}</button>
                  <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">{{ 'save' }}</button>
                </form>
                </div>
              </div>
            </div>
          </div>



          <div wire:ignore.self class="modal fade modal-xl" id="view" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document" >
              <div class="modal-content bg-gradient-dark">
                <div class="modal-header">
                    <div class="d-flex  px-2" id="reportrange" >
                        <div class="form-group">
                            <div class="input-group">


                        <h6  class="btn bg-gradient-white dropdown-toggle">  <i class="fa fa-calendar"></i>&nbsp;{{ $start }} to {{ $end }}</h6>
                    </div>
                </div>
                </div>
                  <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                        <div class="modal-body">

                      <div class="card bg-gradient-dark" >
                      <div class="card-header bg-transparent pb-0">

                      </div>


                      @foreach ($ceks as $detail)
                      <div class="card-body p-3">
                        <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                        <div class="timeline-block">
                        <span class="timeline-step bg-dark text-white">
                        <i class="ni ni-check-bold text-info text-gradient"></i>

                        </span>
                        <div class="timeline-content">
                        <h6 class="text-white text-sm font-weight-bold mb-0">{{ __('produk') }}: {{ $detail->item_wwtp->nama_barang }}</h6>
                        <h6 class="text-white text-sm font-weight-bold mb-0">{{ __('price') }} : @currency($detail->item_wwtp->harga_po)</h6>
                        <h6 class="text-white text-sm font-weight-bold mb-0">QTY : {{ $detail->qty_po }} Kg</h6>
                        <h6 class="text-white text-sm font-weight-bold mb-0">NO. PO : {{ $detail->no_po }} </h6>

                        <h6 class="text-white text-sm font-weight-bold mb-1 mt-2">{{ $detail->created_at }} </h6>


                        </div>
                        </div>
                        </div>
                        </div>
                      @endforeach


                  </div>
              </div>
                <div class="modal-footer ">
                  <button type="button" class="btn btn-link bg-gradient-danger text-secondary ml-auto" data-bs-dismiss="modal">{{ __('close') }}</button>
                </div>
              </div>
            </div>
          </div>


          <script>
            $(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {

        window.livewire.emit('upd', start.format('YYYY-MM-DD 00:00:00'), end.format('YYYY-MM-DD 23:59:59'));

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
