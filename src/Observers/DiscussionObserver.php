<?php

namespace Bitporch\Forum\Observers;

use Bitporch\Forum\Models\Discussion;

class DiscussionObserver
{
    /**
     * Listen to the Discussion created event.
     *
     * @param Discussion $discussion
     *
     * @return void
     */
    public function created(Discussion $discussion)
    {
        $discussion->update(['first_post_id' => $discussion->user_id]);
    }

    /**
     * Listen to the Discussion deleting event.
     *
     * @param Discussion $discussion
     *
     * @return void
     */
    public function deleting(Discussion $discussion)
    {
        //
    }
}
