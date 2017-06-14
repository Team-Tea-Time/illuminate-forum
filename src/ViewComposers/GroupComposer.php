<?php

namespace AndreasElia\Forum\ViewComposers;

use AndreasElia\Forum\Models\Group;
use Illuminate\View\View;

class GroupComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $groups = Group::all();

        $view->with('groups', $groups);
    }
}
