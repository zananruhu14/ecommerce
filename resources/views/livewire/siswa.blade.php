<div>
    @include('livewire.siswaedit')
    @include('livewire.siswashow')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Siswa  {{ $dep->nama }}</h1>
      </div>
    @if(session()->has('success'))
    <div class="alert alert-success col-3" role="alert">
        {{ session('success') }}
      </div><div>
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
        <div class="d-sm-flex justify-content-between">
            <div>
                <button class="btn btn-block bg-gradient-primary  border-0" data-bs-toggle="modal" data-bs-target="#myModal" >New Item</button>
            </div>


            <div class="d-flex">
            <div class="dropdown d-inline mx-2  justify-content-end">
                <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                WWTP
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
                <li><a class="dropdown-item border-radius-md" href="pemakaianstp">STP</a></li>
                </li>

                </ul>
                </div>
            <div class="d-flex  px-2" id="reportrange" >

                <div class="form-group">
                    <div class="input-group">


                <h6  class="btn bg-gradient-info dropdown-toggle ">  <i class="fa fa-calendar"></i>&nbsp;{{ date('d F Y', strtotime($start )) }} to {{ date('d F Y', strtotime($end )) }}</h6>
                <a href="/wwtpprint/{{ $start }}/{{ $end }}" class="btn bg-gradient-info mx-2" target="_blank">
                    <i class="bi bi-printer-fill"></i>
                    Print
                 </a>
            </div>

        </div>
        </div>


        <div class="d-flex">

        </div>
        </div>

            </div>
            <div class="row">
                <div class="col-12">
                <div class="card">
                <div class="table-responsive table-bordered">
                    <table class="table table-flush table-bordered" id="datatable-search">
                        <thead class="thead-light">
                        <tr>
                        <th rowspan="2" class="text-sm"  style="vertical-align : middle;text-align:center;">TANGGAL</th>
                        <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">INLET WWTP</th>
                        <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">OUTLET WWTP</th>
                        @foreach ($items as $item)

                        <th colspan="2"  class="text-center text-sm">{{ $item->nama_barang }} @currency($item->harga_po)</th>
                        @endforeach
                        <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">COST/HARI</th>
                        <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">COST/ M³</th>
                        <th rowspan="2" class="text-sm" style="vertical-align : middle;text-align:center;">Aksi</th>

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
                                class="badge bg-gradient-danger item-align-mid"
                                @else
                                class="badge bg-gradient-success text-center"
                                @endif
                              >{{ date('d F Y', strtotime($g['tanggal'])) }}</td>
                                <td>{{ $g['inlet'] }}</td>
                                <td>{{ $g['outlet'] }}</td>
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
                                    <td>{{ $qty }}</td>
                                    <td>@currency($cost = $qty !== 0 ? $qty * $item->harga_po : 0)</td>
                                    @php
                                        $rowTotal += $cost;
                                         $totalCost += $cost;
                                    @endphp
                                @endforeach
                                <td> @currency($rowTotal)</td>
                                <td>@currency( $costPerM3 = $rowTotal/$g['outlet'])</td>
                                        @php
                                            $totalCostPerM3 += $costPerM3
                                        @endphp
                                <td><button wire:click="sendData('{{ $g['tanggal'] }}')" class="badge bg-gradient-danger"> Delete </button></td>

                            </tr>
                        @endforeach

                        </tbody>
                        {{-- <tfoot style=" border-top: 1px solid black;">
                            <tr style=" border-top: 1px solid black;">
                            <td colspan="11" style=" border-top: 1px solid black;" class="text-center">Jumlah</td>
                            <td style=" border-top: 1px solid black;">@currency($totalCost)</td>
                            <td style=" border-top: 1px solid black;">@currency($totalCostPerM3)</td>
                            </tr>
                            </tfoot> --}}
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
                                Tanggal
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
                            <div class="form-group {{ $errors->has('inlet') ? 'has-error' : '' }}">
                                Inlet / M³
                                <input type="number" name="inlet" class="form-control"
                                       value="{{ old('inlet') }}" required wire:model="inlet" required>
                                @if($errors->has('inlet'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('inlet') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('outlet') ? 'has-error' : '' }}">
                                Outlet / M³
                                <input type="number" name="outlet" class="form-control"
                                       value="{{ old('outlet') }}" wire:model="outlet" required>
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
                                    Item Barang
                                </div>

                                <div class="card-body">
                                    <table class="table" id="products_table">
                                        <thead>
                                        <tr>
                                            <th>Nama Barang</th>
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
                                                        <option value="">-- choose product --</option>
                                                        @foreach ($allProducts as $product)
                                                            <option value="{{ $product->id }}">
                                                                {{ $product->nama_barang }} Harga : {{ $product->harga_po }}
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
                                                    <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-secondary"
                                                wire:click.prevent="addProduct">+ Add Another Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
                          <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal" wire:click.prevent="save()">Simpan</button>
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
                                Tanggal


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
                            <div class="form-group {{ $errors->has('inlet') ? 'has-error' : '' }}">
                                Inlet / M³
                                <input type="number" name="inlet" class="form-control"
                                       value="{{ $edit_id->inlet }}" required wire:model="edit_inlet">
                                @if($errors->has('inlet'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('inlet') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('outlet') ? 'has-error' : '' }}">
                                Outlet / M³
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
                                    Item Barang
                                </div>

                                <div class="card-body">
                                    <table class="table" id="products_table">
                                        <thead>
                                        <tr>
                                            <th>Nama Barang</th>
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
                                                        <option value="">-- choose product --</option>
                                                        @foreach ($allProducts as $product)
                                                            <option value="{{ $product->id }}">
                                                                {{ $product->nama_barang }} Harga : {{ $product->harga_po }}
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
                                                    <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    <tfoot>
                                        <td colspan="3">Jumlah</td>
                                    </tfoot>
                                    </table>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-secondary"
                                                wire:click.prevent="addProduct">+ Add Another Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancelEdit()">Close</button>
                          <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal" wire:click.prevent="saveEdit()">Simpan</button>
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
<div class="card-body">
  @if (session()->has('message'))
      <div class="alert alert-success text-center">{{ session('message') }}</div>
  @endif
    <div>
        @include('livewire.siswacreate')
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                {{-- <a href="/sikeu/pengeluaran/create" class="btn btn-primary mb-2">Buat pengeluaran</a> --}}

                <div class="row justify-content-strat mt-2">
                  <div class="col-3">
                    <input type="text" wire:model="kategori" class="form-control mt-3" placeholder=" Cari Nama Siswa" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>

                <div class="row justify-content-between mt-2">
                    <div class="col-1">

                      <label for="show">Show :</label>
                      <select wire:model="paginate" class="form-control form-control-sm w-auto" name="show">
                          <option value="10">10</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="{{ $ttl }}">Semua</option>
                      </select>
                        @can('smp')
                        <label for="show">Filter Kelas :</label>
                        <select wire:model="filter_kelas" class="form-control form-control-sm w-auto" name="show">
                             <option value="" selected>Semua</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>

                        </select>
                        @endcan



                        </div>

                    <div class="col-3 mt-3">
                      <button  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-notification2"> <i class="bi bi-arrow-up"></i></i> Import</button>
                      <button wire:click="export()" wire:loading.attr="disabled" class="btn btn-success" > <i class="bi bi-download"></i> Excel</button>
                  </div>
                </div>
                <table class="table table-striped table-sm mb-0 bg-gray-200">
                <h1>{{ $detail }}</h1>
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Tanggal</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($siswas) > 0)
                  @foreach ($siswas as $siswa)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $siswa->nama }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $siswa->kelas }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $siswa->tahun_ajaran }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-sm">{{ $siswa->created_at->format('j F, Y') }}</h6>
                    </td>
                    <td class="col text-center">
                        <button class="btn btn-block bg-gradient-info  border-0" data-bs-toggle="modal" data-bs-target="#modal-notification" wire:click="viewStudentDetails({{ $siswa->id }})"><i class="bi bi-eye"></i> Detail</button>
                       @can('setoran')

                       <button class="btn btn-block bg-gradient-warning  border-0" data-bs-toggle="modal" data-bs-target="#edit-notification" wire:click="editStudents({{ $siswa->id }})"><i class="bi bi-pencil-square"></i> Edit</button>
                       @endcan
                       <button class="btn btn-block bg-gradient-danger  border-0r" data-bs-toggle="modal" data-bs-target="#delete-notification"  wire:click="deleteConfirmation({{ $siswa->id }})"><i class="bi bi-trash"></i> Hapus</button>
                       </form>
                   </td>
                  </tr>
                  @endforeach
                 @else
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Data tidak ditemukan</td>
                  </tr>
                  @endif
                </tbody>

              </table>

            </div>
        </div>
        {{ $siswas->links() }}



    <div wire:ignore.self  class="modal fade" id="delete-notification" tabindex="-1" role="dialog" aria-labelledby="delete-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Hapus Data</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="text-gradient text-danger mt-4">Anda Yakin ingin Menghapus?</h4>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" wire:click="deleteStudentData()">Hapus</button>
            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
    <div wire:ignore.self  class="modal fade" id="modal-notification2" tabindex="-1" role="dialog" aria-labelledby="modal-notification2" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Import Data</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form  enctype="multipart/form-data"  wire:submit.prevent="import()">
              @csrf
              <div class="input-group mb-3">
                  <input type="file" name="file" class="form-control " placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="file">

                </div>
                @error('file') <span class="text-danger error">{{ $message }}</span>@enderror

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id="button-addon2"  data-bs-dismiss="modal">Import</button>
            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>
