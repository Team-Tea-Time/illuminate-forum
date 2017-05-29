<?php

namespace App\Observers;

use App\Discussion;

class DiscussionObserver
{
    /**
     * Listen to the Discussion created event.
     *
     * @param  Discussion  $user
     * @return void
     */
    public function created(Discussion $user)
    {
        //
    }

    /**
     * Listen to the Discussion deleting event.
     *
     * @param  Discussion  $user
     * @return void
     */
    public function deleting(Discussion $user)
    {
        //
    }
}
