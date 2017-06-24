<?php

return [

    /*
    |--------------------------------------------------------------------------
    | URL Prefix
    |--------------------------------------------------------------------------
    |
    | This defines the prefix for all of the packages web routes.
    |
    */
    'prefix' => 'forum',

    /*
    |--------------------------------------------------------------------------
    | Controllers Namespace
    |--------------------------------------------------------------------------
    |
    | Base namespace for all controllers available in the package.
    |
    */
    'namespace' => '\Bitporch\Forum\Controllers',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | Set your eloquent model for your users.
    |
    */
    'user' => App\User::class,

    /*
    |--------------------------------------------------------------------------
    | Group Mode
    |--------------------------------------------------------------------------
    |
    | Set the group mode to either "nested" or "flat" for a different forum
    | experience.
    |
    */
    'group_mode' => 'nested',

    /*
    |--------------------------------------------------------------------------
    | Namespacing and Middleware
    |--------------------------------------------------------------------------
    |
    | Include whichever middleware(s) and namespace(s) you want here.
    |
    */
    'api' => [
        'namespace' => '\Bitporch\Forum\Controllers\Api',
    ],

    'web' => [
        'middleware' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ],
    ],
];
