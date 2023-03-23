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
                <h4 class="text-gradient text-danger mt-4">Edit Form {{ $pembayaran->name }}</h4>
                <p>Silahkan isi form dibawah:</p>
              </div>
              <form wire:submit.prevent="editStudentData">
            @csrf

      

            
            <div class="form-group">
              <label for="exampleFormControlInput2">Nama Siswa : </label>
                <select class="form-control form-control-sm" name="siswa_id" wire:model="siswa_id">
                  
                    <option selected>Pilih Siswa</option>
                    @foreach ($create_namas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}  |  Kelas: {{ $siswa->kelas }}</option>
                    @endforeach
                  </select>
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput2">Jenis Sumbangan: </label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="jenis_sumbangan" placeholder="Masukan Jenis Sumbangan" wire:model="jenis_sumbangan">
                @error('jenis_sumbangan') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Jumlah</label>
                <input type="number" class="form-control" id="exampleFormControlInput2" name="jumlah" placeholder="Masukan Jumlah" wire:model="jumlah">
                @error('jumlah') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Uraian:</label>
                <textarea name="uraian" style="height: 500px" class="form-control" id="message-text" wire:model="uraian"></textarea>
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


  <div wire:ignore.self  class="modal fade" id="edit-notification2" tabindex="-1" role="dialog" aria-labelledby="edit-notification2" aria-hidden="true">
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
                <h4 class="text-gradient text-danger mt-4">Edit Form {{ $pembayaran->name }}</h4>
                <p>Silahkan isi form dibawah:</p>
              </div>
              <form wire:submit.prevent="editStudentData2">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput2">Nama Penyumbang</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="nama_penyumbang" placeholder="Masukan Nama Penyumbang" wire:model="nama_penyumbang">
                @error('nama_penyumbang') <span class="text-danger error">{{ $message }}</span>@enderror
              </div>

            <div class="form-group">
                <label for="exampleFormControlInput2">Jumlah</label>
                <input type="number" class="form-control" id="exampleFormControlInput2" name="jumlah" placeholder="Masukan Jumlah" wire:model="jumlah">
                @error('jumlah') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput2">Jenis Sumbangan: </label>
              <input type="text" class="form-control" id="exampleFormControlInput2" name="jenis_sumbangan" placeholder="Masukan Jenis Sumbangan" wire:model="jenis_sumbangan">
              @error('jenis_sumbangan') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Uraian:</label>
                <textarea name="uraian" style="height: 500px" class="form-control" id="message-text" wire:model="uraian"></textarea>
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

