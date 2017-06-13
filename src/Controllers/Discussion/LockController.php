<?php

namespace AndreasElia\Forum\Controllers\Discussion;

use AndreasElia\Forum\Controllers\Controller;
use AndreasElia\Forum\Models\Discussion;
use Carbon\Carbon;

class LockController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $discussion = Discussion::find($id);
        $add = $discussion->update(['locked_at' => Carbon::now()]);

        return response($discussion, 201);
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
        $delete = $discussion->update(['locked_at' => null]);

        return response($discussion, 204);
    }
}
