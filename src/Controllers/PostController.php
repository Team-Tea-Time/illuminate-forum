<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Models\Post;
use AndreasElia\Forum\Requests\Posts\CreatePostRequest;
use AndreasElia\Forum\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
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
     * @param \AndreasElia\Forum\Requests\Posts\CreatePostRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->all());

        return redirect()->route('forum.discussions.show', $post->discussion_id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Posts\UpdatePostRequest $request
     * @param int                                                 $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('forum.discussions.show', $post->discussion_id);
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
        $post = Post::find($id);

        $discussion_id = $post->discussion_id;

        $post->delete();

        return redirect()->route('forum.discussions.show', $post->discussion_id)->with('success', 'Post deleted successfully.');
    }
}
