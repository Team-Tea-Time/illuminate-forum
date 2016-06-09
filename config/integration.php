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
        'category' => Riari\Forum\Models\Category::class,
        'thread' => Riari\Forum\Models\Thread::class,
        'post' => Riari\Forum\Models\Post::class
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
        'forum' => Riari\Forum\Policies\ForumPolicy::class,
        'category' => Riari\Forum\Policies\CategoryPolicy::class,
        'thread' => Riari\Forum\Policies\ThreadPolicy::class,
        'post' => Riari\Forum\Policies\PostPolicy::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Utility Class
    |--------------------------------------------------------------------------
    |
    | Here we specify the namespace of the class to use for various utility
    | methods.
    |
    */

    'utility_class' => TeamTeaTime\Forum\Support\Forum::class

];
