<?php

namespace App\Http\Actions\Contact;

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
        return view('contact');
    }
}