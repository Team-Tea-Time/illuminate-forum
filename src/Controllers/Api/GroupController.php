<?php

namespace Bitporch\Forum\Controllers\Api;

use Bitporch\Forum\Controllers\Controller;
use Bitporch\Forum\Models\Group;
use Bitporch\Forum\Requests\Groups\CreateGroupRequest;
use Bitporch\Forum\Requests\Groups\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Group::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Bitporch\Forum\Requests\Groups\CreateGroupRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $group = Group::create($request->all());

        return response($group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return response($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());

        return response($group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return response($group, 204);
    }
}
