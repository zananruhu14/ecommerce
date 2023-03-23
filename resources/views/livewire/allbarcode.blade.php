<div>

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


        @include('livewire.barcodecreate')
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif

              {{-- @include('livewire.kategoricreate') --}}

              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                      {{-- <a href="/sikeu/pengeluaran/create" class="btn btn-primary mb-2">Buat pengeluaran</a> --}}

                      <div class="row justify-content-start mt-2">
                        <div class="col-3">
                          <input type="text" wire:model="search" class="form-control mt-3" placeholder="Search" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                          <div class="col-2 mt-3">
                            <select class="form-control">
                                <option value="">IDP IMPORTED :</option>
                                @foreach ($idp as $i)
                                <option value="">{{ $i }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-2 mt-3">
                            <select class="form-control">
                                <option value="">Weaving IMPORTED :</option>
                                @foreach ($wev as $w)
                                <option value="">{{ $w }}</option>
                                @endforeach

                            </select>
                        </div>


                    </div>
                    <button wire:click="export()" wire:loading.attr="disabled" class="btn btn-success mt-2" > <i class="bi bi-download"></i> Excel</button>
                    <button wire:click="export()" wire:loading.attr="disabled" class="btn btn-success mt-2" > <i class="bi bi-download"></i> Import</button>
                    <table class="table table-bordered">
                        <thead>
                            <th>combo_id</th>
                            <th>lot_no</th>
                            @foreach ($size_no as $job_comp_code)
                                <th>{{ $job_comp_code }}</th>
                            @endforeach

                        </thead>
                        @foreach ($report as $lot_no => $values)
                            <tr>


                                @foreach ($a as $b)
                                @if (!empty($lapor[$lot_no][$b]['combo_id']))

                                <td>{{ $lapor[$lot_no][$b]['combo_id'] ?? '0' }}</td>
                                @endif

                                @endforeach
                                <td>{{ $lot_no }}</td>
                                @foreach ($size_no as $job_comp_code)
                                    <td>{{ $report[$lot_no][$job_comp_code]['count'] ?? '0' }}</td>
                                @endforeach
                            </tr>
                            @endforeach

                    </table>

                  </div>
              </div>


</div>
