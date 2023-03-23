<table>
    <thead>
        <thead>
            <tr>
            <th>combo_id</th>
            <th>lot_no</th>
            @foreach ($size_no as $job_comp_code)
                <th>{{ $job_comp_code }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
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
    </tbody>
</table>
