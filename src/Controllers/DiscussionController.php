<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Models\Discussion;
use AndreasElia\Forum\Requests\Discussions\CreateDiscussionRequest;
use AndreasElia\Forum\Requests\Discussions\UpdateDiscussionRequest;

class DiscussionController extends Controller
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
        return view('forum::discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Discussions\CreateDiscussionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $request['slug'] = str_slug($request->title, '-');

        $discussion = Discussion::create($request->all());

        return redirect()->route('forum.discussions.show', $discussion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discussion = Discussion::where('id', $id)->with('posts')->firstOrFail();

        return view('forum::discussions.show')->with(compact('discussion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Discussions\UpdateDiscussionRequest $request
     * @param int                                                             $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussionRequest $request, $id)
    {
        $discussion = Discussion::find($id);
        $discussion->update($request->all());

        return redirect()->route('forum.discussions.show', $discussion->id);
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
        $discussion = Discussion::find($id);
        $discussion->delete();

        return redirect()->route('forum.home')->with('success', 'Discussion deleted successfully.');
    }
}
