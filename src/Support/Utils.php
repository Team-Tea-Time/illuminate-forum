<?php namespace TeamTeaTime\Forum\Support;

use Illuminate\Routing\Router;
use Session;

class Utils
{
    /**
     * Register the standard forum routes.
     *
     * @param  mixed  $router
     * @param  string  $namespace
     * @return void
     */
    public function routes($router, $namespace)
    {
        $prefix = config('forum.routing.prefix') . '/api';
        $options = ['namespace' => $namespace, 'middleware' => 'forum.api.auth'];

        // Categories
        $router->group(['prefix' => "{$prefix}/category"] + $options, function () use ($router)
        {
            $router->get('/', ['as' => 'forum.api.category.index', 'uses' => 'CategoryController@index']);
            $router->post('/', ['as' => 'forum.api.category.store', 'uses' => 'CategoryController@store']);
            $router->get('{category}', ['as' => 'forum.api.category.fetch', 'uses' => 'CategoryController@fetch']);
            $router->patch('{category}', ['as' => 'forum.api.category.update', 'uses' => 'CategoryController@update']);
            $router->delete('{category}', ['as' => 'forum.api.category.delete', 'uses' => 'CategoryController@destroy']);
        });

        // Threads
        $router->group(['prefix' => "{$prefix}/thread"] + $options, function () use ($router)
        {
            $router->get('/', ['as' => 'forum.api.thread.index', 'uses' => 'ThreadController@index']);
            $router->get('recent', ['as' => 'forum.api.thread.recent', 'uses' => 'ThreadController@recent']);
            $router->patch('recent', ['as' => 'forum.api.thread.recent', 'uses' => 'ThreadController@markRecent']);
            $router->get('unread', ['as' => 'forum.api.thread.unread', 'uses' => 'ThreadController@unread']);
            $router->patch('unread', ['as' => 'forum.api.thread.unread', 'uses' => 'ThreadController@markUnread']);
            $router->post('/', ['as' => 'forum.api.thread.store', 'uses' => 'ThreadController@store']);
            $router->get('{thread}', ['as' => 'forum.api.thread.fetch', 'uses' => 'ThreadController@fetch']);
            $router->patch('{thread}', ['as' => 'forum.api.thread.update', 'uses' => 'ThreadController@update']);
            $router->delete('{thread}', ['as' => 'forum.api.thread.delete', 'uses' => 'ThreadController@destroy']);
        });

        // Posts
        $router->group(['prefix' => "{$prefix}/post"] + $options, function () use ($router)
        {
            $router->get('/', ['as' => 'forum.api.post.index', 'uses' => 'PostController@index']);
            $router->post('/', ['as' => 'forum.api.post.store', 'uses' => 'PostController@store']);
            $router->get('{post}', ['as' => 'forum.api.post.fetch', 'uses' => 'PostController@fetch']);
            $router->patch('{post}', ['as' => 'forum.api.post.update', 'uses' => 'PostController@update']);
            $router->delete('{post}', ['as' => 'forum.api.post.delete', 'uses' => 'PostController@destroy']);
        });

        // Bulk actions

        // Categories
        $router->group(['prefix' => "{$prefix}/bulk/category"] + $options, function () use ($router)
        {
            $router->patch('/', ['as' => 'forum.api.bulk.category.update', 'uses' => 'CategoryController@bulkUpdate']);
            $router->delete('/', ['as' => 'forum.api.bulk.category.delete', 'uses' => 'CategoryController@bulkDestroy']);
        });

        // Threads
        $router->group(['prefix' => "{$prefix}/bulk/thread"] + $options, function () use ($router)
        {
            $router->patch('/', ['as' => 'forum.api.bulk.thread.update', 'uses' => 'ThreadController@bulkUpdate']);
            $router->delete('/', ['as' => 'forum.api.bulk.thread.delete', 'uses' => 'ThreadController@bulkDestroy']);
        });

        // Posts
        $router->group(['prefix' => "{$prefix}/bulk/post"] + $options, function () use ($router)
        {
            $router->patch('/', ['as' => 'forum.api.bulk.post.update', 'uses' => 'PostController@bulkUpdate']);
            $router->delete('/', ['as' => 'forum.api.bulk.post.delete', 'uses' => 'PostController@bulkDestroy']);
        });
    }

    /**
     * Return an API token for the current user.
     *
     * @return string
     */
    public function getUserAPIToken()
    {
        return str_random(40);
    }
}
