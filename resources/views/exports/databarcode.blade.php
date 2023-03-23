<table>
    <thead>
    <tr>
        <th>d_barcode</th>
        <th>customer_name</th>
        <th>style_no</th>
        <th>opo</th>
        <th>combo_id</th>
        <th>size_no</th>
        <th>lot_no</th>
        <th>brand_seq</th>
        <th>qty</th>
        <th>barcode</th>
        <th>pn_no</th>
        <th>h_barcode</th>
        <th>user_id</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barcodes as $item)
        <tr>
            <td>{{ $item->d_barcode }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->style_no }}</td>
            <td>{{ $item->opo }}</td>
            <td>{{ $item->combo_id }}</td>
            <td>{{ $item->size_no }}</td>
            <td>{{ $item->lot_no }}</td>
            <td>{{ $item->brand_seq }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->barcode }}</td>
            <td>{{ $item->pn_no }}</td>
            <td>{{ $item->h_barcode }}</td>
            <td>{{ $item->user_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
