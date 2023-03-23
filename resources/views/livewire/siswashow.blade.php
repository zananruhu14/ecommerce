<div class="col-md-4">
    <div wire:ignore.self class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Informasi Siswa</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Detail Siswa</h4>
              </div>
              <div class="form-group">
                <label >Dibuat:</label>
                <input type="text" class="form-control" value="{{ $view_username }}" readonly>
            </div>
              <div class="form-group">
                <label >Nama :</label>
                <input type="text" class="form-control" value="{{ $view_nama}}" readonly>
            </div>

              <div class="form-group">
                <label >Kelas :</label>
                <input type="text" class="form-control" value="{{ $view_kelas }}" readonly>
            </div>
            <div class="form-group">
                <label>Tahun Ajaran : </label>
                <input type="Text" class="form-control" value="{{ $view_tahun_ajaran }}" readonly >
            </div>
            <div class="form-group">
                <label>Tanggal : </label>
                <input type="Text" class="form-control" value="{{ $view_tanggal }}" readonly >
            </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link text-white bg-danger  ml-auto" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
