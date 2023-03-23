<div>

    @include('livewire.pengeluaranshow')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Setoran  {{$dep->nama }}</h1>
      </div>
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
        @include('livewire.setorancreate')
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                {{-- <a href="/sikeu/pengeluaran/create" class="btn btn-primary mb-2">Buat pengeluaran</a> --}}

                <div class="row justify-content-strat mt-2">
                  <div class="col-3">
                    <input type="text" wire:model="kategori" class="form-control mt-3" placeholder=" Cari Uraian Setoran" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>

                <div class="row justify-content-between mt-2">
                    <div class="col-4">
                      <label for="show">Show :</label>
                      <select wire:model="paginate" class="form-control form-control-sm w-auto" name="show">
                          <option value="10">10</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="{{ $ttl }}">Semua</option>
                      </select>
                    </div>

                        <div class="col-3 mt-3">
                            <button wire:click="export('xlsx')" wire:loading.attr="disabled" class="btn btn-success" > <i class="bi bi-download"></i> Excel</button>

                        </div>


                </div>
                <table class="table table-striped table-sm mb-0 bg-gray-200">
                <h1>{{ $detail }}</h1>
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Pengeluaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Uraian</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($pengeluarans) > 0)
                  @foreach ($pengeluarans as $pengeluaran)
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
                          <h6 class="mb-0 text-sm">{{ $pengeluaran->kategori->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center" style="max-width: 800px; overflow: hidden;">
                          <h6 class="mb-0 text-sm">{{ $pengeluaran->uraian }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">@currency($pengeluaran->jumlah)</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h6 class="mb-0 text-sm">{{ $pengeluaran->created_at->format('j F, Y') }}</h6>
                    </td>
                    <td class="col text-center">
                        <button class="btn btn-block bg-gradient-info  border-0" data-bs-toggle="modal" data-bs-target="#modal-notification" wire:click="viewStudentDetails({{ $pengeluaran->id }})"><i class="bi bi-eye"></i> Detail</button>
                        @can('setoran')

                        <button class="btn btn-block bg-gradient-danger  border-0r" data-bs-toggle="modal" data-bs-target="#delete-notification"  wire:click="deleteConfirmation({{ $pengeluaran->id }})"><i class="bi bi-trash"></i> Hapus</button>
                        @endcan
                       </form>
                   </td>
                  </tr>
                  @endforeach
                 @else
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Data tidak ditemukan</td>
                  </tr>
                  @endif
                </tbody>

              </table>

            </div>
        </div>
        {{ $pengeluarans->links() }}


        <div class="card bg-secondary mt-2">
          <!-- Card image -->
          <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
            <h6 class="text-center">Total Setoran</h6>
            <!-- List group -->
            <ul class="list-group list-group-flush mt-2">
               <li class="list-group-item ">Total Setoran Hari Ini : <span class="text-bold ">@currency($ttlpengeluarantoday)</span> </li>
               <li class="list-group-item">Total Setoran Bulan Ini : <span class="text-bold">@currency($ttlpengeluaranbulan)</span> </li>
               <li class="list-group-item">Total Semua Setoran : <span class="text-bold">@currency($ttlsetoran)</span> </li>
            </ul>
            <ul class="list-group list-group-flush mt-5">
               <li class="list-group-item">Total Semua Pemasukan: <span class="text-bold">@currency($ttlpemasukan)</span></li>
               <li class="list-group-item">Total Semua Pengeluaran : <span class="text-bold">@currency($ttlpengeluaran)</span></li>
               <li class="list-group-item">Jumlah Kas: <span class="text-bold">@currency($kas)</span></li>
            </ul>
           </div>
          <!-- Card body -->
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
