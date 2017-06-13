<?php

Route::group(['prefix' => config('forum.prefix'), 'as' => 'forum.', 'namespace' => config('forum.namespace')], function () {
    Route::resource('groups', 'GroupController', ['store', 'update', 'destroy']);
    Route::resource('discussions', 'DiscussionController', ['store', 'update', 'destroy']);
    Route::resource('posts', 'PostController', ['store', 'update', 'destroy']);

    Route::resource('lock', 'Discussion\LockController', ['store', 'destroy']);
    Route::resource('sticky', 'Discussion\StickyController', ['store', 'destroy']);
});
