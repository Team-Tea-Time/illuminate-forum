<?php

namespace AndreasElia\Forum\Contracts;

use AndreasElia\Forum\Models\Discussion;
use AndreasElia\Forum\Models\Post;

class PostRepository
{
    /**
     * This repositories model.
     *
     * @var Post
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function addPost($data)
    {
        $this->post->create($data);
    }

    public function updatePost($data)
    {
        $this->post->update($data);
    }

    public function deletePost($id)
    {
        $this->post->destroy($id);
    }

    public function addPostToDiscussion(Post $post, Discussion $discussion)
    {
        $discussion->attach($post);
    }
}
