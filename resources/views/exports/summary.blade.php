<table >
    <thead >
    <tr>
    <th >Bulan</th>
    <th >WWTP</th>
    <th >STP</th>
    <th >Total</th>

    </tr>

    </thead>
    <tbody>

        @foreach ($grouped as $g)
        <tr>


            <td>{{ date("F", mktime(0, 0, 0, $g->month, 10)) }} {{ $g->year }}</td>


            <td>@currency($g->total_status_1)</td>

            <td>@currency($g->total_status_2)</td>

            <td>@currency($g->total)</td>

        </tr>
    @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td >Total</td>
            <td >@currency($total_wwtp->total)</td>
            <td >@currency($total_stp->total)</td>
            <td >@currency($grantototal->total)</td>

        </tr>
    </tfoot>
    </table>
