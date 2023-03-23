<div>

    @include('livewire.navbar_warehouse')
    @if(session()->has('success'))
        <div class="alert alert-success col-3" role="alert">
            {{ session('success') }}
          </div>
        @endif
    <div class="d-sm-flex justify-content-between mt-3">
        {{-- <div>
            @can('secre')
            <button class="btn btn-icon bg-gradient-primary" wire:click="approve">
                Approve
                </button>
            @endcan
            @can('superadmin')
            <button class="btn btn-icon bg-gradient-primary" wire:click="approveAdmin">
                Approve admin
                </button>
            @endcan
            @can('sj')
               <button class="btn btn-icon bg-gradient-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
                Approve
                </button>
            @endcan

        </div> --}}
        <div class="d-flex">
            <select class="btn bg-gradient-dark dropdown-toggle" wire:model="podol">
                <option selected value=""> Filter</option>
                <option value="1">Pending</option>
                <option value="2">Reject</option>
                <option  value="3">Approve Sekretaris</option>
                <option  value="4">Approve Gudang</option>
                <option  value="5">Sudah Ada SJ</option>
                <option  value="">Semua</option>
              </select>



        <div class="d-flex px-2">
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text" id="inputGroup-sizing-default">Search ID</span>
                  <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" wire:model="tai">
                </div>
            </div>
        </div>

        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="table-responsive">
        <table class="table table-flush" id="datatable-search">
        <thead class="thead-light">

        <th>Id</th>
        <th>Date</th>
        <th>Status</th>
        <th>Users</th>
        <th >Name</th>
        <th >Spec</th>
        <th >Desc</th>
        <th >Size</th>
        <th >Color</th>
        <th >PO</th>
        <th >IDP</th>
        <th >Buyer</th>
        <th >Location</th>
        <th >Stock</th>
        <th >Unit</th>
        <th >Order Qty</th>
        <th >Action</th>
        @can('admin')
        <th>Action</th>
        @endcan


        </thead>
        <tbody>

            @foreach ($items as $item)
        <tr>
        <td>
        <div class="d-flex align-items-center">
         <div class="form-check">
        <input class="form-check-input"  id="customCheck1" wire:model.defer="selectedRows" type="checkbox" value="{{ $item->id }}">
        </div>
        <p class="text-xs font-weight-bold ms-2 mb-0">#{{ $item->id }}</p>
        </div>
        </td>
        <td class="font-weight-bold">
        <span class="my-2 text-xs">{{ $item->created_at }}</span>
        </td>
        <td class="text-xs font-weight-bold">
        <div class="d-flex align-items-center">

        @if ($item->form->status == 1)
        <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-undo" aria-hidden="true"></i></button>
        <span>Pending</span>
            @elseif ($item->form->status == 2)
            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
            <span>Reject</span>
            @elseif ($item->form->status == 3)
            <button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="ni ni-circle-08"></i></button>
            <span>Approved Sekretaris</span>

            @elseif ($item->form->status == 4)
            <button class="btn btn-icon-only btn-rounded btn-outline-primary mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="ni ni-delivery-fast" aria-hidden="true"></i></button>
            <span>Approved Gudang</span>
            @else
            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
            <span>Dibuatkan SJ</span>
        @endif

        </div>
        </td>
        <td >
        <span>{{ $item->user->name }}  | {{ $item->user->departemen }}</span>
        </td>

        <td style="max-width: 300px ; overflow-x:scroll">
            <span class="my-2 text-xs">{{ $item->acce_name }}</span>
      </td>

        <td style="max-width: 300px ; overflow-x:scroll">
            <span class="my-2 text-xs">{{ $item->acce_spec }}</span>
      </td>
      <td style="max-width: 300px ; overflow-x:scroll">
            <span class="my-2 text-xs">{{ $item->acce_desc }}</span>
      </td>
      <td style="max-width: 300px ; overflow-x:scroll">
            <span class="my-2 text-xs">{{ $item->acce_size }}</span>
      </td>
      <td style="max-width: 300px ; overflow-x:scroll">
            <span class="my-2 text-xs">{{ $item->acce_color }}</span>
      </td>
      <td style="max-width: 300px ; overflow-x:scroll">
              <span class="my-2 text-xs">{{ $item->acce_po }}</span>
        </td>
      <td style="max-width: 300px ; overflow-x:scroll">
              <span class="my-2 text-xs">{{ $item->acce_idp }}</span>
        </td>
      <td style="max-width: 300px ; overflow-x:scroll">
              <span class="my-2 text-xs">{{ $item->acce_supplier }}</span>
        </td>
          <td style="max-width: 300px ; overflow-x:scroll">
                  <span class="my-2 text-xs">{{ $item->acce_warehouse_detail }}</span>

            </td>

            <td>
            <span class="my-2 text-xs">{{ $item->acce_qty }}</span>
      </td>
      <td style="max-width: 50px;" >

              <span  class="my-2 text-xs">{{ $item->acce_unit }}</span>

        </td>








        <td class="text-xs font-weight-bold">
            <button class="btn btn-block bg-gradient-info  border-0" data-bs-toggle="modal" data-bs-target="#modal-notification" wire:click="viewAcce({{ $item->id }})"><i class="bi bi-eye"></i> Detail</button>
        </td>
        @can('admin')
        <td class="text-xs font-weight-bold">

            <a href="/gudang/edit/{{ $item->form->id }}/{{ $item->user_id }}" class="btn btn-block bg-gradient-warning  border-0"><i class="bi bi-pencil-square"></i> Edit</a>
            {{-- <button class="btn btn-block bg-gradient-danger  border-0r"   wire:click="deleteForm({{ $item->id }})"><i class="bi bi-trash"></i> Reject</button> --}}
        </td>
        @endcan

        <td>
            <div class="dropdown">
                <a href="javascript:;" class="btn bg-gradient-info dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                   Print
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="/form/{{ $item->form->id }}">
                           Form
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/npb/{{ $item->form->id }}">
                          Nota Penyerahan
                        </a>
                    </li>

                </ul>

        </td>
        </tr>
        @endforeach
        </tbody>
        </table>

        {{$items->links()}}

        </div>
        </div>
        </div>
        </div>




    {{-- <div wire:ignore.self class="modal fade modal-xl" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document" >
          <div class="modal-content bg-gradient-dark">
            <div class="modal-header">
              <h6 class="modal-title text-white" id="modal-title-notification"></h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
                    <div class="modal-body">

                  <div class="card bg-gradient-dark" >
                  <div class="card-header bg-transparent pb-0">

                  </div>


                  @foreach ($product as $detail)
                  <div class="card-body p-3">
                  <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                  <div class="timeline-block">
                  <span class="timeline-step bg-dark text-white">
                  <i class="ni ni-check-bold text-info text-gradient"></i>

                  </span>
                  <div class="timeline-content">
                  <h6 class="text-white text-sm font-weight-bold mb-0">Acce Name: {{ $detail->acce_name }}</h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Qty : {{ $detail->acce_qty }}</h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Spec : {{ $detail->acce_spec }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Desc : {{ $detail->acce_desc }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Color : {{ $detail->acce_color }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Size : {{ $detail->acce_size }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Supplier : {{ $detail->acce_supplier }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">PO : {{ $detail->acce_po }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">NPB : {{ $detail->acce_npb }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Warehouse : {{ $detail->acce_warehouse }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Warehouse Detail : {{ $detail->acce_warehouse_detail }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-1 mt-4">{{ $detail->created_at }} </h6>


                  </div>
                  </div>
                  </div>
                  </div>
             @endforeach
              </div>
          </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-link bg-gradient-danger text-secondary ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


      <div wire:ignore.self  class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
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
                    <h4 class="text-gradient text-danger mt-4">Form Pemasukan</h4>
                    <p>Silahkan isi form dibawah:</p>
                  </div>
              <form  wire:submit.prevent="approveSj()">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput2">No. SJ</label>
                    <input type="sj" class="form-control" id="exampleFormControlInput2" name="sj" placeholder="Masukan sj" wire:model="sj">
                    @error('sj') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
              <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Simpan</button>
            </form>
            </div>
          </div>
        </div>
      </div> --}}

</div>
