<?php

namespace AndreasElia\Forum\Contracts;

use AndreasElia\Forum\Models\Discussion;
use AndreasElia\Forum\Models\Group;

class DiscussionRepository
{
    /**
     * This repositories model.
     *
     * @var Discussion
     */
    protected $discussion;

    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }

    public function addDiscussion($data)
    {
        $this->discussion->create($data);
    }

    public function updateDiscussion($data)
    {
        $this->discussion->update($data);
    }

    public function deleteDiscussion($id)
    {
        $this->discussion->destroy($id);
    }

    public function addDiscussionToGroup(Discussion $discussion, Group $group)
    {
        $group->attach($discussion);
    }
}
