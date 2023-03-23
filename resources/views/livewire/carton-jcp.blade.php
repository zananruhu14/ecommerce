<div>
    @include('navbar.navbarcarton')
    <div class="row my-3 justify-content-between">



        {{-- <div class="col3">
            <a href="/cartonguprint/{{ $search }}" class="btn bg-gradient-info mx-2" target="_blank">
                <i class="bi bi-printer-fill"></i>
                Print
             </a>
        </div> --}}
    </div>

    <div class="row mt-3">
        <div class="col-12 col-sm-2">
        <label>Length</label>
        <input class="multisteps-form__input form-control" type="text" wire:model='submit_p'/>
        </div>
        <div class="col-12 col-sm-2 mt-3 mt-sm-0">
        <label>Width</label>
        <input class="multisteps-form__input form-control" type="text" wire:model='submit_l'/>
        </div>
        <div class="col-12 col-sm-2 mt-3 mt-sm-0">
        <label>Height</label>
        <input class="multisteps-form__input form-control" type="text" wire:model='submit_t'/>
        </div>
        <div class="col-12 col-sm-2 mt-2 pt-4 mt-sm-0">
            <button type="button" class="btn btn-info" wire:click="submit()">Query</button>
            </div>

        </div>
<div class="row mt-3">
    <div class="col-8">

        <div class="col-12 col-md-12 col-xl-12 mt-md-0 mt-4 mb-2">
            <div class="card h-100">
            <div class="card-header pb-0 p-3">
            <div class="row">
            <div class="col-md-8 d-flex align-items-center">
            <h6 class="mb-0">Kebutuhan Karton</h6>
            </div>
            <div class="col-md-4 text-end">

            </div>
            </div>
            </div>
            <div class="card-body p-3">

            <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">IDP:</strong> &nbsp; @foreach ($idp as $i)
    {{ $i }}
            @endforeach</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">STYLE NO.:</strong> &nbsp;
                @foreach ($style as$s)
                    {{ $s }}
                @endforeach


            </li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">BUYER:</strong> &nbsp; JCP</li>
            <li class="list-group-item border-0 ps-0 pb-0">
            </li>
            </ul>
            </div>
            </div>
            </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datatable-search">
            <thead class="table-dark">
                <tr>
                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">Length</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">Width</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">Height</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">Box / Pcs</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">BOX / Cnt</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7" rowspan="3">Ready / Not</th>






                </tr>
              </thead>
              <tbody>
           @foreach ($hasil as $item)
                      <tr>

                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                {{ $item->xLength }}
                            </h6>
                                  </div>
                                </div>
                              </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                {{ $item->xWidth }}
                            </h6>
                                  </div>
                                </div>
                              </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                {{ $item->xHeight }}
                            </h6>
                                  </div>
                                </div>
                              </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                {{ $item->xBoxPcs }}
                            </h6>
                                  </div>
                                </div>
                              </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                {{ $item->xBoxCNT }}
                            </h6>
                                  </div>
                                </div>
                              </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        @php
                                        $matched = false;

                                        foreach ($dimensions as $spec) {
                                            if ($item->xLength == $spec['length'] && $item->xWidth == $spec['width'] && $item->xHeight == $spec['height']) {
                                                echo "Ready";
                                                $matched = true;
                                                break;
                                            }
                                        }

                                        if (!$matched) {
                                            echo "not Ready";
                                        }
                                        @endphp
                            </h6>
                                  </div>
                                </div>
                              </td>



                        </tr>
              @endforeach
              <tfoot  class="table-dark">
                <tr>
                  <td class="text-center" colspan="3">Total</td>
                  <td class=" text-bold" >{{ $total_pcs }}</td>
                  <td class=" text-bold" >{{ $total_cnt }}</td>
                  <td></td>

                </tr>
              </tfoot>

                  </tbody>
                  </table>
                </div>
    </div>



    <div class="col-4">
        <div class="card">
            <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
            <h6 class="mb-0">Stock Carton JCP </h6>
            </div>
            </div>
            <div class="card-body p-3">
            <ul class="list-group list-group-flush list my--3">

                @foreach ($grouped_stock as $s)
                <li class="list-group-item px-0 border-0">
                    <div class="row align-items-center">

                    <div class="col">
                    <p class="text-xs font-weight-bold mb-0">Size:</p>
                    <h6 class="text-xs mb-0">{{ $s['size'] }}</h6>
                    </div>
                    <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">IDP:</p>
                    <h6 class="text-xs text-wrap mb-0">
                    @foreach ($s['xPO'] as $i)
                        {{ $i }} <br>
                    @endforeach

                    </h6>
                    </div>
                    <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Stock:</p>
                    <h6 class="text-xs  text-wrap mb-0">{{ $s['total'] }}</h6>
                    </div>
                    <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">PO:</p>
                    <h6 class="text-xs text-wrap mb-0">
                        @foreach ($s['xBuyNo'] as $i)
                        {{ $i }} <br>
                    @endforeach
                    </h6>
                    </div>

                    </div>
                    <hr class="horizontal dark mt-3 mb-1">
                    </li>
                @endforeach



            </ul>
            </div>
            </div>
    </div>
</div>


</div>

