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
    <div class="d-sm-flex justify-content-between">
        <div>
            <button class="btn btn-block bg-gradient-primary  border-0" data-bs-toggle="modal" data-bs-target="#newProduct" >{{ __('add') }} {{ __('test') }}</button>
        </div>


        <div class="d-flex">
            <div class="dropdown d-inline mx-2  justify-content-end">
                <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                    WWTP
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
                <li><a class="dropdown-item border-radius-md" href="cekphstp">STP</a></li>
                </li>

                </ul>
                </div>
        <div class="d-flex" id="reportrange" >

            <div class="form-group">
                <div class="input-group">


            <h6  class="btn bg-gradient-info dropdown-toggle ">  <i class="fa fa-calendar"></i>&nbsp;{{ date('d F Y', strtotime($start )) }} to {{ date('d F Y', strtotime($end )) }}</h6>
            <a href="/phprint/{{ $start }}/{{ $end }}/1" class="btn bg-gradient-info mx-2" target="_blank">
                <i class="bi bi-printer-fill"></i>
                Print
             </a>
             <button class="btn bg-gradient-success" wire:click="export">
                <i class="bi bi-file-earmark-excel"></i>
                Excel
             </button>
        </div>

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
                    <th rowspan="3" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">{{ __('date') }}</th>
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
                        <th rowspan="1" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">{{ __('option') }}</th>
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
                                    <td class="text-center">
                                        <button wire:click="sendData('{{ $d->id }}')" class="badge bg-gradient-danger"> {{ __('delete') }} </button>
                                        <button wire:click="edit('{{ $d->id }}')" class="badge bg-gradient-info" data-bs-toggle="modal" data-bs-target="#edit"> Edit </button>
                                    </td>

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
                                    <td class="text-center">
                                        <button wire:click="sendData('{{ $p->id }}')" class="badge bg-gradient-danger"> {{ __('delete') }} </button>
                                        <button wire:click="edit('{{ $p->id }}')" class="badge bg-gradient-info" data-bs-toggle="modal" data-bs-target="#edit"> Edit </button>
                                    </td>

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




            <div wire:ignore.self  class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
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
                            <h4 class="text-gradient text-danger mt-4">Form {{ __('test') }}</h4>
                            <p>{{ __('silahkan_isi_form') }}</p>
                          </div>
                      <form  wire:submit.prevent="newStock()">
                        @csrf
<div class="row">
    <label for="exampleFormControlInput2">{{ __('date') }}</label>
    <input type="date" class="form-control" wire:model="tanggal" name="tanggal">
    <label for="exampleFormControlInput2">Shift</label>
    <select  class="form-control" wire:model="shift" name="shift">
        <option  selected>{{ __('choose') }} ...</option>
        <option value="1">Shift 1</option>
        <option value="2">Shift 2</option>
    </select>
    <label for="exampleFormControlInput2">{{ __('type') }} WWTP/STP</label>
    <select  class="form-control" wire:model="status" name="status">
        <option  selected>{{ __('choose') }} ...</option>
        <option value="1">WWTP</option>
        <option value="2">STP</option>
    </select>
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlInput2">COD</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="cod" placeholder="Masukan COD" wire:model="cod" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror

            <label for="exampleFormControlInput2">BOD</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="bod" placeholder="Masukan BOD" wire:model="bod" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror

            <label for="exampleFormControlInput2">TDS</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="tds" placeholder="Masukan TDS" wire:model="tds" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
            <label for="exampleFormControlInput2">TSS</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="tss" placeholder="Masukan TSS" wire:model="tss" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
            <label for="exampleFormControlInput2">COLOR</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="color" placeholder="Masukan COLOR" wire:model="color" >
    </div>
</div>
    <div class="col-6">

        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">DO</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="do" placeholder="Masukan DO" wire:model="do">
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">SV30</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="sv30" placeholder="Masukan SV30" wire:model="sv30" >
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">PH</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="qty" placeholder="Masukan PH" wire:model="qty" >
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">Temperatur</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="temperatur" placeholder="Masukan TEMPERATUR" wire:model="temperatur" >
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

</div>
</div>







                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">{{ __('close') }}</button>
                      <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">{{ __('save') }}</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>



              <div wire:ignore.self  class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ __('create') }} Form</h5>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="text-gradient text-danger mt-4">Edit Form</h4>
                            <p>{{ __('silahkan_isi_form') }}:</p>
                          </div>
                      <form  >
                        @csrf
<div class="row">
    <label for="exampleFormControlInput2">{{ __('date') }}</label>
    <input type="date" class="form-control" wire:model="edit_tanggal" name="tanggal">
    <label for="exampleFormControlInput2">Shift</label>
    <select  class="form-control" wire:model="edit_shift" name="edit_shift">
            <option value="">{{ __('choose') }}</option>
            <option value="1">Shift 1</option>
            <option value="2">Shift 2</option>

    </select>
    <label for="exampleFormControlInput2">Jenis WWTP/STP</label>
    <select  class="form-control" wire:model="edit_status" name="status">
        <option value="">{{ __('choose') }}</option>
        <option value="1">WWTP</option>
        <option value="2">STP</option>

    </select>
    <div class="col-6">
        <div class="form-group">
            <label for="exampleFormControlInput2">COD</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="cod" placeholder="Masukan COD" wire:model="edit_cod" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror

            <label for="exampleFormControlInput2">BOD</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="bod" placeholder="Masukan BOD" wire:model="edit_bod" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror

            <label for="exampleFormControlInput2">TDS</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="tds" placeholder="Masukan TDS" wire:model="edit_tds" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
            <label for="exampleFormControlInput2">TSS</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="tss" placeholder="Masukan TSS" wire:model="edit_tss" >
            @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
            <label for="exampleFormControlInput2">COLOR</label>
            <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="color" placeholder="Masukan COLOR" wire:model="edit_color" >
    </div>
</div>
    <div class="col-6">

        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">DO</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="do" placeholder="Masukan DO" wire:model="edit_do">
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">SV30</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="sv30" placeholder="Masukan SV30" wire:model="edit_sv30" >
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">PH</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="qty" placeholder="Masukan PH" wire:model="edit_qty" >
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput2">Temperatur</label>
        <input  step="0.1" type="number" class="form-control" id="exampleFormControlInput2" name="temperatur" placeholder="Masukan TEMPERATUR" wire:model="edit_temperatur" >
        @error('nama_barang') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

</div>
</div>







                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" >{{ __('close') }}</button>
                      <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal" wire:click="update()">{{ __('save') }}</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>


              <script>
                $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {

            window.livewire.emit('tanggalPh', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

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
