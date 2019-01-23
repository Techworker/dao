<?php

namespace App\Http\Actions\Profile\Contract\Api;

use App\Contract;
use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Actions\Profile\ShowContractsAction;
use App\Http\Requests\ProposalRequest;
use App\Nova\Filters\ProposalStatus;
use App\Proposal;
use App\ProposalDocument;
use App\User;
use Illuminate\Http\Request;

class UploadTaxAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Contract $contract)
    {
        /** @var User $user */
        $user = \Auth::user();

        $tax_declaration = $contract->tax_file;
        if($request->file('tax_file') !== null) {
            $tax_declaration = $request->file('tax_file')->store('contracts', 'local');
        }
        $contract->tax_declaration = $tax_declaration;
        $contract->save();

        $request->session()->flash('flash', 'Updated tax declaration.');

        return redirect(ShowContractsAction::route());
    }
}