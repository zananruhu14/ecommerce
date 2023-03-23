<div>
    @include('livewire.navbar_acce')
    @if(session()->has('success'))
    <div class="alert alert-success col-3" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body">
  @if (session()->has('message'))
      <div class="alert alert-success text-center">{{ session('message') }}</div>
  @endif
    <div>
        {{-- @include('livewire.siswacreate') --}}
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                {{-- <a href="/sikeu/pengeluaran/create" class="btn btn-primary mb-2">Buat pengeluaran</a> --}}

                <div class="row justify-content-strat mt-2">
                  <div class="col-3">
                    <input type="text" wire:model.debounce.100ms="po" class="form-control mt-3" placeholder="Masukan PO" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>

                <div class="row justify-content-between mt-2">
                    <div class="col-1">

                      <label for="show">Show :</label>
                      <select wire:model="paginate" class="form-control form-control-sm w-auto" name="show">
                          <option value="10">10</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="">Semua</option>
                      </select>
                        </div>

                    <div class="col-3 mt-3">
                      <button  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-notification2"> <i class="bi bi-arrow-up"></i></i> Import</button>
                      <button wire:click="export()" wire:loading.attr="disabled" class="btn btn-success" > <i class="bi bi-download"></i> Excel</button>
                  </div>
                </div>
                <table class="table table-striped table-sm mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Spec</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desc</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Buyer</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PO</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NPB</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">QTY</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)


                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->acce_name }}</h6>
                          </div>
                        </div>
                      </td>

                      <td style="max-width: 200px; overflow: text-wrap;">
                        <div class="d-flex px-2 py-1" >
                          <div class="d-flex flex-column justify-content-center" >
                            <h6 class="mb-0 text-sm text-wrap">{{ $item->acce_spec }}</h6>
                          </div>
                        </div>
                      </td>
                      <td style="max-width: 200px; overflow: text-wrap;">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center"  >
                            <h6 class="mb-0 text-sm text-wrap">{{ $item->acce_desc }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->acce_supplier }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->acce_idp }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->acce_npb }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->acce_qty }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <button class="btn btn-block bg-gradient-success  border-0"  wire:click="addConsumble({{ $item->id }})"><i class="bi bi-basket"></i>Edit</button>
                            <button class="btn btn-block bg-gradient-primary  border-0r"  wire:click="addAsset({{ $item->id }})"> <i class="bi bi-shop-window"></i> Hapus</button>
                          </div>
                        </div>
                      </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>

            </div>
        </div>




    <div wire:ignore.self  class="modal fade" id="delete-notification" tabindex="-1" role="dialog" aria-labelledby="delete-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Hapus Data</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="text-gradient text-danger mt-4">Anda Yakin ingin Menghapus?</h4>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" wire:click="deleteStudentData()">Hapus</button>
            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
    <div wire:ignore.self  class="modal fade" id="modal-notification2" tabindex="-1" role="dialog" aria-labelledby="modal-notification2" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Import Data</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form  enctype="multipart/form-data"  wire:submit.prevent="import()">
              @csrf
              <div class="input-group mb-3">
                  <input type="file" name="file" class="form-control " placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="file">

                </div>
                @error('file') <span class="text-danger error">{{ $message }}</span>@enderror

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id="button-addon2"  data-bs-dismiss="modal">Import</button>
            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal" wire:click.prevent="cancel()">Close</button>
          </form>
          </div>
        </div>
      </div>
    </div>


</div>
