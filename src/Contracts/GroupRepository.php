<?php

namespace AndreasElia\Forum\Contracts;

use AndreasElia\Forum\Models\Group;

class GroupRepository
{
    /**
     * This repositories model.
     *
     * @var Group
     */
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function addGroup($data)
    {
        $this->group->create($data);
    }

    public function updateGroup($data)
    {
        $this->group->update($data);
    }

    public function deleteGroup($id)
    {
        $this->group->destroy($id);
    }
}
