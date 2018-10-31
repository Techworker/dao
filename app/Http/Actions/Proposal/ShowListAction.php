<?php

namespace App\Http\Actions\Proposal;

use App\Http\Actions\AbstractAction;
use App\Proposal;

class ShowListAction extends AbstractAction
{
    public function __invoke(string $status)
    {
        if(!isset(Proposal::STATUS_TYPES[$status]) && $status !== 'all') {
            abort(404, 'Unknown status');
        }

        $counts = [];
        foreach(Proposal::STATUS_TYPES as $key => $label) {
            $counts[$key] = Proposal::currentStatus($key)->count();
        }
        $counts['all'] = array_sum($counts);

        $proposals = [];
        if($status === 'all') {
            foreach(Proposal::STATUS_TYPES as $key => $value) {
                if($key !== 'draft') {
                    $proposals[$key] = Proposal::currentStatus($key)->orderBy('created_at', 'DESC')->take(3)->get();
                }
            }
        } else {
            $proposals[$status] = Proposal::currentStatus($status)->orderBy('created_at', 'DESC')->get();
        }

        return view('proposals2', [
            'proposals' => $proposals,
            'counts' => $counts,
            'status' => $status
        ]);
    }
}