<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>To</th>
        <th>Amount</th>
        <th>Payload</th>
        <th>Contract</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{date('Y-m-d H:i:s', $payment->time)}}</td>
            <td>{{$payment->to_pasa}}</td>
            <td>{{$payment->amount}}</td>
            <td style="word-break: break-all">{{$payment->payload}}</td>
            <td>
                <?php var_dump($payment->contract->id); ?>
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
