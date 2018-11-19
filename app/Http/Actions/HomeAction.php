<?php

namespace App\Http\Actions;

use App\Http\AbstractAction;
use App\Proposal;

/**
 * Class HomeAction
 *
 * Displays the home page.
 */
class HomeAction extends AbstractAction
{
    /**
     * Shows the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('home', [
            'proposals' => Proposal::otherCurrentStatus(Proposal::STATUS_DRAFT)->orderBy('updated_at', 'DESC')->take(3)->get()
        ]);
    }
}
