<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Repositories\PostRepository;
use AndreasElia\Forum\Requests\Posts\CreatePostRequest;
use AndreasElia\Forum\Requests\Posts\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * The repository for this controller.
     *
     * @var \AndreasElia\Forum\Repositories\PostRepository $postRepository
     */
    protected $postRepository;

    /**
     * [__construct description]
     *
     * @param \AndreasElia\Forum\Repositories\PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\Posts\CreatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $add = $this->postRepository->addPost($request->all());

        return response($add, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\Posts\UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $update = $this->postRepository->updatePost($request->all());

        return response($update, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->postRepository->deletePost($id);

        return response($delete, 204);
    }
}
