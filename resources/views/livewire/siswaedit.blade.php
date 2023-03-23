<div class="col-md-4">
    <!-- Modal -->
    <div wire:ignore.self  class="modal fade" id="edit-notification" tabindex="-1" role="dialog" aria-labelledby="edit-notification" aria-hidden="true">
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
                  <h4 class="text-gradient text-danger mt-4">Edit Form Siswa</h4>
                  <p>Silahkan isi form dibawah:</p>
                </div>
                <form wire:submit.prevent="editStudentData">
              @csrf

              <div class="form-group">
                  <label for="exampleFormControlInput2">Nama</label>
                  <input type="text" class="form-control" id="exampleFormControlInput2" name="nama" placeholder="Masukan Nama" wire:model="nama">
                  @error('nama') <span class="text-danger error">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                  <label for="message-text" class="col-form-label">Kelas:</label>
                  <input name="kelas" class="form-control" id="message-text" wire:model="kelas">
                  @error('kelas') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
              <div class="form-group">
                  <label for="message-text" class="col-form-label">Tahun ajaran:</label>
                  <input name="tahun ajaran" class="form-control" id="message-text" wire:model="tahun_ajaran">
                  @error('tahun_ajaran') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                
                   <div class="form-group">
              <label for="exampleFormControlInput2">Status : </label>
                <select class="form-control form-control-sm" name="role_sumbangan" wire:model="role_sumbangan">
    
                    <option value="1">Aktif </option>
                     <option value="4">Lulus </option>
                         <option value="3">Keluar </option>
                  </select>
                @error('role_sumbangan') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
            <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
