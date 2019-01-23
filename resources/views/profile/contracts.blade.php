@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <div class="intro-box">
                <h2>Contracts &amp; Payments</h2>
                <p>A list of your established contracts for your project developments and payments.</p>
            </div>
        </div>
        <div class="col-md-12">
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
                @foreach($data as $datum)
                    <tr>
                        <td>
                            <a href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route(['contractor' => $datum['contractor']])}}" class="font-weight-bold">{{$datum['contractor']->publicName()}}</a>
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
                    @if($datum['contract']->tax_declaration === null)
                        <tr>
                            <td colspan="6" style="padding: 0">
                                <div class="alert-danger p-2 text-white">
                                <form enctype="multipart/form-data" action="{{\App\Http\Actions\Profile\Contract\Api\UploadTaxAction::route(['contract' => $datum['contract']])}}" method="post">
                                    Please upload tax declaration for this contract: <a href="#" class="upload_tax font-weight-bold text-white">Click here to select a file</a>
                                    @csrf
                                    <input type="file" style="display: none;" class="tax_file" name="tax_file">
                                    <input type="submit" value="Upload file" style="display: none;">
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endif
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
        </div>
    </div>
@endsection