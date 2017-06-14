<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Models\Group;
use AndreasElia\Forum\Requests\Groups\CreateGroupRequest;
use AndreasElia\Forum\Requests\Groups\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * Display the specified resource.
     *
     * @param string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $group = Group::where('slug', $slug)->with('discussions')->firstOrFail();

        return view('forum::groups.show')->with(compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Groups\UpdateGroupRequest $request
     * @param string                                                $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $slug)
    {
        $group = Group::where('slug', $slug)->firstOrFail();
        $group->update($request->all());

        return response($group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $group = Group::where('slug', $slug)->firstOrFail();
        $group->delete();

        return response($group, 204);
    }
}
