<?php

Route::prefix(config('forum.api.prefix'))->middleware(config('forum.api.middleware'))->namespace(config('forum.api.namespace'))->name('forum.api.')->group(function () {
    Route::resource('discussions', 'DiscussionController', ['except' => ['create', 'edit']]);
    Route::resource('groups', 'GroupController', ['except' => ['create', 'edit']]);
    Route::resource('posts', 'PostController', ['except' => ['create', 'edit']]);

    Route::patch('discussions/{discussion}/flags', 'Discussion\FlagController@update')->name('discussions.flag');
});
