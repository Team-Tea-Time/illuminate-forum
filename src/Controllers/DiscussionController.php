<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Repositories\DiscussionRepository;
use AndreasElia\Forum\Requests\Discussion\CreateDiscussionRequest;
use AndreasElia\Forum\Requests\Discussion\UpdateDiscussionRequest;
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
     * @param  \AndreasElia\Forum\Requests\Discussion\CreateDiscussionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $this->discussionRepository->addDiscussion($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\Discussion\UpdateDiscussionRequest  $request
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
