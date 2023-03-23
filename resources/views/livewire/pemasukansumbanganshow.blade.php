
    <div wire:ignore.self class="modal fade modal-xl" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document" >
          <div class="modal-content bg-gradient-dark">
            <div class="modal-header">
              <h6 class="modal-title text-white" id="modal-title-notification"> {{ $pembayaran->name }}</h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
                    <div class="modal-body">

                  <div class="card bg-gradient-dark" >
                  <div class="card-header bg-transparent pb-0">
                  <h6 class="text-white">Nama Penyumbang : {{ $view_nama}}</h6>
                  <h6 class="text-white">Kelas : {{ $view_kelas}}</h6>
                  <h6 class="text-white">Tahun Ajaran : {{ $view_tahun_ajaran }}</h6>
                  </div>


                  <div class="card-body p-3">
                  <div class="timeline timeline-one-side" data-timeline-axis-style="dashed">
                  <div class="timeline-block">
                  <span class="timeline-step bg-dark text-white">
                  <i class="ni ni-check-bold text-info text-gradient"></i>

                  </span>
                  <div class="timeline-content">
                  <h6 class="text-white text-sm font-weight-bold mb-0">Jenis Sumbangan : {{ $view_jenis_sumbangan }}</h6>
                  <h6 class="text-white text-sm font-weight-bold mb-0">@currency($view_jumlah), Pembayaran {{ $pembayaran->name }}</h6>


                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> {{ $view_tanggal }} | Oleh : {{ $view_username}}</p>
                  <p class="text-secondary text-sm mt-3 mb-2">
                  {{ $view_uraian }}
                  </p>
                  {{-- <button class="badge badge-sm bg-gradient-success" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#edit-notification" wire:click="editStudents({{ $view_all->id }})">Edit</button>
                  <button class="badge badge-sm bg-gradient-warning" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#delete-notification" wire:click="deleteConfirmation({{ $item->id }})">Hapus</button> --}}
                  </div>
                  </div>
                  </div>
                  </div>

              </div>
          </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-link bg-gradient-danger text-secondary ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

