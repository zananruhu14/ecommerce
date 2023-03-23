<div>
    <div class="col-md-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#itil">
            Create New IDP
          </button>

        <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
          Create Old IDP
        </button>

        <!-- Modal -->
        <div wire:ignore.self  class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="py-3 text-center">
                      <i class="ni ni-bell-55 ni-3x"></i>
                      <h4 class="text-gradient text-danger mt-4">Form IDP</h4>
                      <p>Isi IDP:</p>
                    </div>

                    <form  enctype="multipart/form-data"  wire:submit.prevent="import()">
                        @csrf
                        <div class="input-group mb-3">

                          </div>
                          @error('file') <span class="text-danger error">{{ $message }}</span>@enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Old IDP</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="weaving" wire:model='weaving' placeholder="Masukan IDP">
                        @error('idp') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Simpan</button>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>



      <div wire:ignore.self  class="modal fade" id="itil" tabindex="-1" role="dialog" aria-labelledby="itilTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New IDP</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">Form IDP</h4>
                    <p>Isi IDP:</p>
                  </div>

                  <form  enctype="multipart/form-data"  wire:submit.prevent="itil()">
                      @csrf
                      <div class="input-group mb-3">
                        <input type="file" wire:model="importFile" class="@error('import_file') is-invalid @enderror">
                        </div>
                        @error('file') <span class="text-danger error">{{ $message }}</span>@enderror
                  <div class="form-group">
                      <label for="exampleFormControlInput2">IDP</label>
                      <input type="text" class="form-control" id="exampleFormControlInput2" name="weaving_number" wire:model='weaving_number' placeholder="Masukan IDP">
                      @error('weaving') <span class="text-danger error">{{ $message }}</span>@enderror
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">Simpan</button>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>

      </div>





    {{-- <form wire:submit.prevent="import" enctype="multipart/form-data">
        @csrf
        <input type="file" wire:model="importFile" class="@error('import_file') is-invalid @enderror">
        <button class="btn btn-outline-secondary">Import</button>
        @error('import_file')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </form> --}}

    @if($importing && !$importFinished)
        <div wire:poll="updateImportProgress">Importing...please wait.</div>
    @endif

    @if($importFinished)
        Finished importing.
    @endif
</div>
