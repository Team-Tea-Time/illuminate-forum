<?php

Route::prefix(config('forum.prefix'))->group(function () {
    Route::get('/', function () {
        return 'Hallo Welt';
    });

    Route::post('groups/create', 'GroupController@store');
    Route::put('groups/{id}', 'GroupController@update');
    Route::delete('groups/{id}', 'GroupController@destroy');

    Route::post('discussions/create', 'DiscussionController@store');
    Route::put('discussions/{id}', 'DiscussionController@update');
    Route::delete('discussions/{id}', 'DiscussionController@destroy');

    Route::post('posts/create', 'PostController@store');
    Route::put('posts/{id}', 'PostController@update');
    Route::delete('posts/{id}', 'PostController@destroy');
});
