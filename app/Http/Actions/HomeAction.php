<?php

namespace App\Http\Actions;

use Illuminate\Http\Request;

class HomeAction extends AbstractAction
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('home');
    }
}
