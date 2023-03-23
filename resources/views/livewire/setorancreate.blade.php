<div class="col-md-4">
    <!-- Button trigger modal -->
    @can('setoran')


    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
      Buat Setoran
    </button>
    @endcan
    <!-- Modal -->
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
                  <h4 class="text-gradient text-danger mt-4">Form Setoran</h4>
                  <p>Silahkan isi form dibawah:</p>
                </div>
            <form  wire:submit.prevent="storeStudentData()">
              @csrf

              <div class="form-group">
                <label for="exampleFormControlInput2">Jenis Pemasukan :</label>
                <select class="form-control form-control-sm" name="kategori_id" wire:model="kategori_id">
                    <option selected>Pilih Jenis Pemasukan</option>
                    @foreach ($kategoris as $categori)
                    <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                    @endforeach
                  </select>
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
              <div class="form-group">
                  <label for="exampleFormControlInput2">Jumlah</label>
                  <input type="number" class="form-control" id="exampleFormControlInput2" name="jumlah" placeholder="Masukan Jumlah" wire:model="jumlah">
                  @error('jumlah') <span class="text-danger error">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                  <label for="message-text" class="col-form-label">Uraian:</label>
                  <textarea style="height: 500px" name="uraian" class="form-control" id="message-text" wire:model="uraian"></textarea>
                  @error('uraian') <span class="text-danger error">{{ $message }}</span>@enderror
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
