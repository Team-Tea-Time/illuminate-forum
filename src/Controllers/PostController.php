<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Models\Post;
use AndreasElia\Forum\Requests\Posts\CreatePostRequest;
use AndreasElia\Forum\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
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

        return response($post, 201);
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

        return response($post, 200);
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
        $post->delete();

        return response($post, 204);
    }
}
