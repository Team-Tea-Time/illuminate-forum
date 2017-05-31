<?php

Route::prefix(config('forum.prefix'))->group(function () {
    Route::get('/', function () {
        return 'Hallo Welt';
    });
});
