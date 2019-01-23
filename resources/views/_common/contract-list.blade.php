<table class="table table-striped">
    <thead>
    <tr>
        <th>Contractor</th>
        <th>Proposal</th>
        <th>Role</th>
        <th>Payment</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contracts as $datum)
        <tr>
            <td>
                <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $datum['contractor'], 'slug' => $datum['contractor']->slug])}}" class="font-weight-bold">{{$datum['contractor']->public_name}}</a>
            </td>
            <td>
                <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $datum['proposal']])}}" class="font-weight-bold">{{$datum['proposal']->title}}</a>
            </td>
            <td>
                {{$datum['contract']->role}}<br />
                {{$datum['contract']->role_description}}
            </td>
            <td>
                Payment Date:
                @if($datum['contract']->payment_date !== null)
                    {{$datum['contract']->payment_date->format('Y-m-d')}}
                @else
                    Unknown
                @endif<br />
                Payment to: {{$datum['contract']->pasa}}<br />
                Amount: {{$datum['contract']->total_value}} PASC<br />
                Payload: {{$datum ['contract']->payload()}}<br />
            </td>
        </tr>
        @if($datum['contract']->bc_ophash !== null)
            <tr>
                <td colspan="6" style="padding: 0;">
                    <div class="alert-info p-2 text-white">
                        Contract paid in block {{$datum['contract']->bc_block}}. <a class="text-white" href="http://explorer.pascalcoin.org/findoperation.php?ophash={{$datum['contract']->bc_ophash}}">Click here to see the transaction</a>
                    </div>
                </td>
            </tr>
        @endif

    @endforeach
    </tbody>
</table>