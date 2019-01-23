<?php

namespace App\Http\Actions\Voting;

use App\Http\AbstractAction;
use App\Proposal;

/**
 * Class ContactAction
 *
 * Displays The contact form.
 */
class ShowAction extends AbstractAction
{
    /**
     * Displays the form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $upcoming = Proposal::where('voting_start', '>', date('Y-m-d'))->where('voting_end', '<', date('Y-m-d'))->get();
        return view('voting', [
            'upcoming' => $upcoming
        ]);
    }
}