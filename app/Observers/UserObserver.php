<?php

namespace App\Observers;

use App\Contractor;
use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $contractor = new Contractor();
        $contractor->user_id = $user->id;
        $contractor->public_name = $user->name;
        $contractor->save();

        $contractor->setStatus(Contractor::STATUS_NOT_APPROVED, 'Account created');
    }
}
