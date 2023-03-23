<div class="col-md-4">
    <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage2">
        Create New IDP
      </button>

    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
      Create Old IDP
    </button>
    @if($importing && !$importFinished)
    <button class="btn btn-primary btn-sm mb-2" type="button" disabled>
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Loading...
      </button>
    <div wire:poll="updateImportProgress">Importing...please wait.</div>
@endif

@if($importFinished)

    Finished importing.
@endif

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
                        <input type="file" name="file" class="form-control " placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="file">
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



  <div wire:ignore.self  class="modal fade" id="exampleModalMessage2" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessage2Title" aria-hidden="true">
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

              <form  enctype="multipart/form-data"  wire:submit.prevent="import2()">
                  @csrf
                  <div class="input-group mb-3">
                      <input type="file" name="file" class="form-control " placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="file">
                    </div>
                    @error('file') <span class="text-danger error">{{ $message }}</span>@enderror
              <div class="form-group">
                  <label for="exampleFormControlInput2">IDP</label>
                  <input type="text" class="form-control" id="exampleFormControlInput2" name="weaving" wire:model='weaving' placeholder="Masukan IDP">
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
