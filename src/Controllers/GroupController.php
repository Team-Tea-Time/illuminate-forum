<?php

namespace AndreasElia\Forum\Controllers;

use AndreasElia\Forum\Repositories\GroupRepository;
use AndreasElia\Forum\Requests\Groups\CreateGroupRequest;
use AndreasElia\Forum\Requests\Groups\UpdateGroupRequest;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * The repository for this controller.
     *
     * @var \AndreasElia\Forum\Repositories\GroupRepository
     */
    protected $groupRepository;

    /**
     * [__construct description].
     *
     * @param \AndreasElia\Forum\Repositories\GroupRepository $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
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
        $add = $this->groupRepository->addGroup($request->all());

        return response($add, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \AndreasElia\Forum\Requests\Groups\UpdateGroupRequest $request
     * @param int                                                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        $update = $this->groupRepository->updateGroup($request->all());

        return response($update, 200);
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
        $delete = $this->groupRepository->deleteGroup($id);

        return response($delete, 204);
    }
}
