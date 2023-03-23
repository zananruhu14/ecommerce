<div class="col-md-4">
    <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
      Buat Jenis Pemasukan / Pengeluarn
    </button>

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
                  <h4 class="text-gradient text-danger mt-4">Form Pemasukan</h4>
                  <p>Silahkan isi form dibawah:</p>
                </div>

            @if (auth()->user()->is_admin !== 2)
            <form  wire:submit.prevent="storeStudentData()">
                @csrf
                <div class="form-group">
                    <select class="form-control form-control-sm" name="jenis" wire:model="jenis">
                        <option selected>Pilih Jenis Pemasukan Jenis</option>
                        <option value="1">Pemasukan</option>
                        <option value="2">Pengeluaran</option>

                      </select>
                    @error('jenis') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput2">Nama Jenis Kategori</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="name" placeholder="Masukan name" wire:model="name">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
              <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Simpan</button>
            </form>
            @else
            <form  wire:submit.prevent="StudentData()">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput2">Nama Jenis Kategori</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="name" placeholder="Masukan name" wire:model="name">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
              <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Simpan</button>
            </form>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
