<?php

Route::prefix(config('forum.prefix'))->namespace(config('forum.namespace'))->group(function () {
    Route::resource('groups', 'GroupsController', ['store', 'update', 'destroy']);
    Route::resource('discussions', 'DiscussionsController', ['store', 'update', 'destroy']);
    Route::resource('posts', 'PostsController', ['store', 'update', 'destroy']);
});
