<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Contracts\PostRepository;
use AndreasElia\Forum\Requests\CreatePostRequest;
use AndreasElia\Forum\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * The repository for this controller.
     *
     * @var \AndreasElia\Forum\Contracts\PostRepository $postRepository
     */
    protected $postRepository;

    /**
     * [__construct description]
     *
     * @param \AndreasElia\Forum\Contracts\PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\CreatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $this->postRepository->addPost($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $this->postRepository->updatePost($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->deletePost($id);
    }
}
