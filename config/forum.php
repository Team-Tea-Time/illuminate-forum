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
    'prefix'        => 'forum',

    /*
    |--------------------------------------------------------------------------
    | Controllers Namespace
    |--------------------------------------------------------------------------
    |
    | Base namespace for all controllers available in the package.
    |
    */
    'namespace'     => '\Bitporch\Forum\Controllers',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | Set your eloquent model for your users.
    |
    */
    'user'          => App\User::class,

    'api' => [
        'namespace' => '\Bitporch\Forum\Controllers\Api',
    ],

    'web' => [
         'middleware' => [
           \Illuminate\Routing\Middleware\SubstituteBindings::class,
           ],
    ],
];
