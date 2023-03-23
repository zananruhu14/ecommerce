<div class="col-md-4">
    <div wire:ignore.self class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Informasi Pemasukan</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Detail Pemasukan</h4>
              </div>
              <div class="form-group">
                <label >Dibuat / Diterima oleh :</label>
                <input type="text" class="form-control" value="{{ $view_username }}" readonly>
            </div>
              <div class="form-group">
                <label >Tanggal :</label>
                <input type="text" class="form-control" value="{{ $view_tanggal}}" readonly>
            </div>

              <div class="form-group">
                <label >Jenis Pemasukan :</label>
                <input type="text" class="form-control" value="{{ $view_kategori_id }}" readonly>
            </div>
            <div class="form-group">
                <label>Jumlah : </label>
                <input type="Text" class="form-control" value="@currency($view_jumlah)" readonly >

            </div>
            <div class="card card-frame">
                <div class="card-body">
                    <h6 class="text-center">Uraian:</h6>
                    {{ $view_uraian }}
                </div>
              </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link text-secondary ml-auto" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
