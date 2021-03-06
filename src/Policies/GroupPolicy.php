<?php

namespace Bitporch\Firefly\Policies;

use App\User;
use Bitporch\Firefly\Models\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can manage the group.
     *
     * @param \App\User  $user
     * @param \App\Group $group
     *
     * @return bool
     */
    public function manage(User $user, Group $group)
    {
        return true;
    }
}
