<?php namespace TeamTeaTime\Forum\Support;

use Illuminate\Routing\Router;
use Session;

class Forum
{
    /**
     * Register the standard forum routes.
     *
     * @param  Router  $r
     * @return void
     */
    public static function routes(Router $r)
    {
        $r->group(['prefix' => 'api', 'namespace' => 'API', 'as' => 'api.', 'middleware' => 'forum.api.auth'], function ($r)
        {
            // Categories
            $r->group(['prefix' => 'category', 'as' => 'category.'], function ($r)
            {
                $r->get('/', ['as' => 'index', 'uses' => 'CategoryController@index']);
                $r->post('/', ['as' => 'store', 'uses' => 'CategoryController@store']);
                $r->get('{category}', ['as' => 'fetch', 'uses' => 'CategoryController@fetch']);
                $r->patch('{category}', ['as' => 'update', 'uses' => 'CategoryController@update']);
                $r->delete('{category}', ['as' => 'delete', 'uses' => 'CategoryController@destroy']);
            });

            // Threads
            $r->group(['prefix' => 'thread', 'as' => 'thread.'], function ($r)
            {
                $r->get('/', ['as' => 'index', 'uses' => 'ThreadController@index']);
                $r->get('recent', ['as' => 'recent', 'uses' => 'ThreadController@recent']);
                $r->patch('recent', ['as' => 'recent', 'uses' => 'ThreadController@markRecent']);
                $r->get('unread', ['as' => 'unread', 'uses' => 'ThreadController@unread']);
                $r->patch('unread', ['as' => 'unread', 'uses' => 'ThreadController@markUnread']);
                $r->post('/', ['as' => 'store', 'uses' => 'ThreadController@store']);
                $r->get('{thread}', ['as' => 'fetch', 'uses' => 'ThreadController@fetch']);
                $r->patch('{thread}', ['as' => 'update', 'uses' => 'ThreadController@update']);
                $r->delete('{thread}', ['as' => 'delete', 'uses' => 'ThreadController@destroy']);
            });

            // Posts
            $r->group(['prefix' => 'post', 'as' => 'post.'], function ($r)
            {
                $r->get('/', ['as' => 'index', 'uses' => 'PostController@index']);
                $r->post('/', ['as' => 'store', 'uses' => 'PostController@store']);
                $r->get('{post}', ['as' => 'fetch', 'uses' => 'PostController@fetch']);
                $r->patch('{post}', ['as' => 'update', 'uses' => 'PostController@update']);
                $r->delete('{post}', ['as' => 'delete', 'uses' => 'PostController@destroy']);
            });

            // Bulk actions
            $r->group(['prefix' => 'bulk', 'as' => 'bulk.'], function ($r)
            {
                // Categories
                $r->group(['prefix' => 'category', 'as' => 'category.'], function ($r)
                {
                    $r->patch('/', ['as' => 'restore', 'uses' => 'CategoryController@bulkUpdate']);
                    $r->delete('/', ['as' => 'delete', 'uses' => 'CategoryController@bulkDestroy']);
                });

                // Threads
                $r->group(['prefix' => 'thread', 'as' => 'thread.'], function ($r)
                {
                    $r->patch('/', ['as' => 'restore', 'uses' => 'ThreadController@bulkUpdate']);
                    $r->delete('/', ['as' => 'delete', 'uses' => 'ThreadController@bulkDestroy']);
                });

                // Posts
                $r->group(['prefix' => 'post', 'as' => 'post.'], function ($r)
                {
                    $r->patch('/', ['as' => 'update', 'uses' => 'PostController@bulkUpdate']);
                    $r->delete('/', ['as' => 'delete', 'uses' => 'PostController@bulkDestroy']);
                });
            });
        });
    }
}
