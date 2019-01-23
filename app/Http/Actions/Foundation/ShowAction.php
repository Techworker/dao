<?php

namespace App\Http\Actions\Foundation;

use App\FoundationPayment;
use App\Http\AbstractAction;

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
        return view('foundation', [
            'payments_1000' => FoundationPayment::where('from_pasa', 1000)->orderBy('time', 'DESC')->get(),
            'payments_1001' => FoundationPayment::where('from_pasa', 1001)->orderBy('time', 'DESC')->get(),
            'payments_1002' => FoundationPayment::where('from_pasa', 1002)->orderBy('time', 'DESC')->get()
        ]);
    }
}