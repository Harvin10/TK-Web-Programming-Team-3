<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Purchase Date</td>
            <td>Card Name</td>
            <td>Card Number</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($collection as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->created_at->format('j F Y')}}</td>
            <td>{{$item->card_name}}</td>
            <td>{{$item->card_number}}</td>
            <td>Rp. {{number_format($item->total)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>