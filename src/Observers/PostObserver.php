<?php

namespace AndreasElia\Forum\Observers;

use AndreasElia\Forum\Models\Post;

class PostObserver
{
    /**
     * Listen to the Post created event.
     *
     * @param  Post  $user
     * @return void
     */
    public function created(Post $user)
    {
        //
    }

    /**
     * Listen to the Post deleting event.
     *
     * @param  Post  $user
     * @return void
     */
    public function deleting(Post $user)
    {
        //
    }
}
