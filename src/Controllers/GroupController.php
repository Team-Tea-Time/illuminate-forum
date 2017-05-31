<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Contracts\GroupRepository;
use AndreasElia\Forum\Requests\CreateGroupRequest;
use AndreasElia\Forum\Requests\UpdateGroupRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * The repository for this controller.
     *
     * @var \AndreasElia\Forum\Contracts\GroupRepository $groupRepository
     */
    protected $groupRepository;

    /**
     * [__construct description]
     *
     * @param \AndreasElia\Forum\Contracts\GroupRepository $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\CreateGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $this->groupRepository->addGroup($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AndreasElia\Forum\Requests\UpdateGroupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        $this->groupRepository->updateGroup($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->groupRepository->deleteGroup($id);
    }
}
