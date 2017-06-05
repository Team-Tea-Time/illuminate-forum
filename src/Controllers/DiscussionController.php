<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Repositories\DiscussionRepository;
use AndreasElia\Forum\Requests\Discussions\CreateDiscussionRequest;
use AndreasElia\Forum\Requests\Discussions\UpdateDiscussionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * The repository for this controller.
     *
     * @var \AndreasElia\Forum\Repositories\DiscussionRepository $discussionRepository
     */
    protected $discussionRepository;

    /**
     * [__construct description]
     *
     * @param \AndreasElia\Forum\Repositories\DiscussionRepository $discussionRepository
     */
    public function __construct(DiscussionRepository $discussionRepository)
    {
        $this->discussionRepository = $discussionRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\Discussions\CreateDiscussionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $add = $this->discussionRepository->addDiscussion($request->all());

        return response($add, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\Discussions\UpdateDiscussionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussionRequest $request, $id)
    {
        $update = $this->discussionRepository->updateDiscussion($request->all());

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
        $delete = $this->discussionRepository->deleteDiscussion($id);

        return response($delete, 200);
    }
}
