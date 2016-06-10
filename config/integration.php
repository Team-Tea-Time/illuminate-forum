<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Here we specify the model classes to use.
    |
    */

    'models' => [
        'category' => TeamTeaTime\Forum\Models\Category::class,
        'thread' => TeamTeaTime\Forum\Models\Thread::class,
        'post' => TeamTeaTime\Forum\Models\Post::class,
        'user' => App\User::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Policies
    |--------------------------------------------------------------------------
    |
    | Here we specify the policy classes to use. Change these if you want to
    | extend the provided classes and use your own instead.
    |
    */

    'policies' => [
        'forum' => TeamTeaTime\Forum\Policies\ForumPolicy::class,
        'category' => TeamTeaTime\Forum\Policies\CategoryPolicy::class,
        'thread' => TeamTeaTime\Forum\Policies\ThreadPolicy::class,
        'post' => TeamTeaTime\Forum\Policies\PostPolicy::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Utility Class
    |--------------------------------------------------------------------------
    |
    | Here we specify the class to use for various utility methods.
    |
    */

    'utility_class' => TeamTeaTime\Forum\Support\Utils::class,

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    | Application model attributes used by the forum.
    |
    */

    'attributes' => [
        'user' => [
            'name' => 'name'
        ]
    ],

];
