<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Contracts\DiscussionRepository;
use AndreasElia\Forum\Requests\CreateDiscussionRequest;
use AndreasElia\Forum\Requests\UpdateDiscussionRequest;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * The repository for this controller.
     *
     * @var \AndreasElia\Forum\Contracts\DiscussionRepository $discussionRepository
     */
    protected $discussionRepository;

    /**
     * [__construct description]
     *
     * @param \AndreasElia\Forum\Contracts\DiscussionRepository $discussionRepository
     */
    public function __construct(DiscussionRepository $discussionRepository)
    {
        $this->discussionRepository = $discussionRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\CreateDiscussionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $this->discussionRepository->addDiscussion($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\UpdateDiscussionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussionRequest $request, $id)
    {
        $this->discussionRepository->updateDiscussion($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->discussionRepository->deleteDiscussion($id);
    }
}
