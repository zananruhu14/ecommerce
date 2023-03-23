<div>
    <div class="d-sm-flex justify-content-between">
        <div>
        <a href="javascript:;" class="btn btn-icon bg-gradient-primary">
        New order
        </a>
        </div>
        <div class="d-flex">
            <div class="dropdown">
                <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                    Filter
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                        <a class="dropdown-item" href="javascript:;">
                          Deutsch
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:;">
                         English(UK)
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:;">
                          Français
                        </a>
                    </li>
                </ul>
              </div>
        <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
        <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
        <span class="btn-inner--text">Export CSV</span>
        </button>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="table-responsive">
        <table class="table table-flush" id="datatable-search">
        <thead class="thead-light">
        <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Status</th>
        <th>Users</th>
        <th>Aksesoris</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
        <tr>
        <td>
        <div class="d-flex align-items-center">
         <div class="form-check">
        <input class="form-check-input" type="checkbox" id="customCheck1">
        </div>
        <p class="text-xs font-weight-bold ms-2 mb-0">#{{ $item->id }}</p>
        </div>
        </td>
        <td class="font-weight-bold">
        <span class="my-2 text-xs">{{ $item->created_at }}</span>
        </td>
        <td class="text-xs font-weight-bold">
        <div class="d-flex align-items-center">

        @if ($item->status == 1)
        <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-undo" aria-hidden="true"></i></button>
        <span>Pending</span>
            @elseif ($item->status == 2)
            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
            <span>Reject</span>
            @else
            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
            <span>Approve</span>
        @endif

        </div>
        </td>
        <td class="text-xs font-weight-bold">
        <div class="d-flex align-items-center">
        <span>{{ $item->user->name }}  | {{ $item->departemen->nama }}</span>
        </div>
        </td>
        <td class="text-xs font-weight-bold">
            <button class="btn btn-block bg-gradient-info  border-0" data-bs-toggle="modal" data-bs-target="#modal-notification" wire:click="viewAcce({{ $item->id }})"><i class="bi bi-eye"></i> Detail</button>
        </td>
        <td class="text-xs font-weight-bold">
            @if($item->status === 3)
            <button class="btn btn-block bg-gradient-success  border-0" ><i class="bi bi-check-circle"></i></i>Sudah Approve</button>
            @else
            <button class="btn btn-block bg-gradient-success  border-0"  wire:click="approve({{ $item->id }})"><i class="bi bi-check-circle"></i></i> Approve</button>

            @endif
            <button class="btn btn-block bg-gradient-warning  border-0" data-bs-toggle="modal" data-bs-target="#edit-notification" wire:click="editStudents({{ $item->id }})"><i class="bi bi-pencil-square"></i> Edit</button>
            <button class="btn btn-block bg-gradient-danger  border-0r" data-bs-toggle="modal" data-bs-target="#delete-notification"  wire:click="deleteConfirmation({{ $item->id }})"><i class="bi bi-trash"></i> Reject</button>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>




    <div wire:ignore.self class="modal fade modal-xl" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                  <h6 class="text-white text-sm font-weight-bold mb-0">Spec : {{ $detail->acce_spec }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Desc : {{ $detail->acce_desc }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">Supplier : {{ $detail->acce_supplier }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">PO : {{ $detail->acce_po }} </h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">PO : {{ $detail->acce_npb }} </h6>


                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Diminta Oleh : {{ $detail->nama_peminta }}</p>
                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $detail->created_at }}</p>
                  <p class="text-secondary text-sm mt-3 mb-2">

                    Tujuan Permintaan :
                  {{  $detail->acce_keterangan }}
                  </p>

                  <button class="badge badge-sm bg-gradient-success" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#edit-notification" wire:click="editStudents({{ $item->id }})">Edit</button>
                  <button class="badge badge-sm bg-gradient-warning" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#delete-notification" wire:click="deleteConfirmation({{ $item->id }})">Hapus</button>


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
</div>
