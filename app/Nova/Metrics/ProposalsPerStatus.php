<?php

namespace App\Nova\Metrics;

use App\Contractor;
use App\Proposal;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class ProposalsPerStatus extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $counts = [];
        foreach(Proposal::STATUS_TYPES as $status => $label) {
            $count = Proposal::currentStatus($status)->count();
            if($count > 0) {
                $counts[$status] = $count;
            }
        }

        return $this->result($counts)->label(function($value) {
            return Proposal::STATUS_TYPES[$value];
        });
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'proposals-per-status';
    }
}
