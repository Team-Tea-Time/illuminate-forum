<?php

Route::prefix('api/forum')->middleware('auth:api')->namespace(config('forum.api.namespace'))->group(function () {
    Route::resource('discussions', 'DiscussionController', ['except' => ['create', 'edit']]);
    Route::resource('groups', 'GroupController', ['except' => ['create', 'edit']]);
    Route::resource('posts', 'PostController', ['except' => ['create', 'edit']]);
});