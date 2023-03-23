<table class="table table-striped table-bordered" id="datatable-search">
    <thead class="thead-light">
    <tr>
    <th rowspan="3" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TANGGAL</th>
    <th rowspan="3" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">SHIFT</th>

    </tr>
    <tr>
        <th rowspan="1" colspan="10" class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">PARAMETER</th>

    </tr>

    <tr>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">COD</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">BOD <sup>5</sup></th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TDS</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TSS</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">COLOR</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">DO</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">SV30</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">PH</th>
        <th rowspan="1"  class="text-sm text-dark"  style="vertical-align : middle;text-align:center;">TEMPERATUR</th>

    </tr>
    </thead>
    <tbody>
        @foreach($group as $g)


                <tr >
                    <td rowspan="2" style="vertical-align : middle;text-align:center;" class="bg-success">

                       {{ date('d F Y', strtotime($g)) }}

                    </td>



                    @foreach ($cekph1 as $d)
                    @if ($g == $d->tanggal)
                    <td>{{ $d->shift }}</td>
                    <td >{{ number_format($d->cod, 1) }} </td>
                    <td >{{ number_format($d->bod, 1) }}</td>
                    <td >{{ number_format($d->tds, 1) }}</td>
                    <td >{{ number_format($d->tss, 1) }}</td>
                    <td >{{ number_format($d->color, 1) }}</td>
                    <td >{{ number_format($d->do, 1) }}</td>
                    <td >{{ number_format($d->sv30, 1) }}</td>
                    <td >{{ number_format($d->qty, 1) }}</td>
                    <td >{{ number_format($d->temperatur, 1) }}</td>


                    @endif
                    @endforeach


                </tr>
                <tr >

                    @foreach ($cekph2 as $p)
                    @if ($g == $p->tanggal)
                  <td>{{ $p->shift }}</td>
                    <td >{{ number_format($p->cod, 1) }} </td>
                    <td >{{ number_format($p->bod, 1) }}</td>
                    <td >{{ number_format($p->tds, 1) }}</td>
                    <td >{{ number_format($p->tss, 1) }}</td>
                    <td >{{ number_format($p->color, 1) }}</td>
                    <td >{{ number_format($p->do, 1) }}</td>
                    <td >{{ number_format($p->sv30, 1) }}</td>
                    <td >{{ number_format($p->qty, 1) }}</td>
                    <td >{{ number_format($p->temperatur, 1) }}</td>


                    @endif
                    @endforeach
                </tr>



        @endforeach


    </tbody>

    </table>
