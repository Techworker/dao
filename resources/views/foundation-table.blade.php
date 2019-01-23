<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>To</th>
        <th>Amount</th>
        <th>Payload</th>
        <th>Project / Contractor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{date('Y-m-d H:i:s', $payment->time)}}</td>
            <td>{{$payment->to_pasa}}</td>
            <td>{{$payment->amount}}</td>
            <td style="word-break: break-all">{{wordwrap($payment->payload, 60, "<br />")}}</td>
            <td>
                @if($payment->contract !== null)
                    <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $payment->contract->contractor, 'slug' => $payment->contract->contractor->slug])}}" class="font-weight-bold">{{$payment->contract->contractor->public_name}}</a><br />
                        <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $payment->contract->proposal])}}" class="font-weight-bold">{{$payment->contract->proposal->title}}
                @else
                    Unknown
                @endif
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
