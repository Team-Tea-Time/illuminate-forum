<?php

namespace Bitporch\Forum\Traits;

use Bitporch\Forum\Models\Discussion;
use Bitporch\Forum\Models\Post;

trait ForumUser
{
    /**
     * Return all the discussions created by the user.
     *
     * @return mixed
     */
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    /**
     * Get all the posts created by the user.
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
