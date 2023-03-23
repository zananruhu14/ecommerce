<div class="col-md-4">
    <div wire:ignore.self class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Informasi Jenis {{ $view_jenis }}</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Detail Jenis {{ $view_jenis }}</h4>
              </div>


              <div class="form-group">
                  <label >Nama Jenis {{ $view_jenis }} :</label>
                  <input type="text" class="form-control" value="{{ $view_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Jenis Kategori : </label>

                    <input type="Text" class="form-control" value="{{ $view_jenis }}" readonly >



                </div>
                <div class="form-group">
                  <label >Tanggal :</label>
                  <input type="text" class="form-control" value="{{ $view_tanggal}}" readonly>
              </div>

        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link text-secondary ml-auto" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
