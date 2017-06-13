<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Models\Group;
use AndreasElia\Forum\Requests\Groups\CreateGroupRequest;
use AndreasElia\Forum\Requests\Groups\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Groups\CreateGroupRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $group = Group::create($request->all());

        return response($group, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Groups\UpdateGroupRequest $request
     * @param int                                                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        $group = Ground::find($id);
        $group->update($request->all());

        return response($group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return response($group, 204);
    }
}
