<?php namespace TeamTeaTime\Forum\Support;

use Illuminate\Routing\Router;
use Session;

class Utils
{
    /**
     * Register the standard forum routes.
     *
     * @param  mixed  $router
     * @param  string  $prefix
     * @param  string  $as
     * @param  string  $namespace
     * @param  array  $middleware
     * @return void
     */
    public function routes(
        $router,
        $prefix = 'forum/api',
        $as = 'forum.api.',
        $namespace = 'TeamTeaTime\Forum\Http\Controllers',
        $middleware = ['forum.api.auth']
    )
    {
        $options = compact('namespace', 'middleware');

        // Categories
        $router->group(['prefix' => "{$prefix}/category"] + $options, function () use ($router, $as)
        {
            $router->get('/', ['as' => "{$as}.category.index", 'uses' => 'CategoryController@index']);
            $router->post('/', ['as' => "{$as}category.store", 'uses' => 'CategoryController@store']);
            $router->get('{category}', ['as' => "{$as}category.fetch", 'uses' => 'CategoryController@fetch']);
            $router->patch('{category}', ['as' => "{$as}category.update", 'uses' => 'CategoryController@update']);
            $router->delete('{category}', ['as' => "{$as}category.delete", 'uses' => 'CategoryController@destroy']);
        });

        // Threads
        $router->group(['prefix' => "{$prefix}/thread"] + $options, function () use ($router, $as)
        {
            $router->get('/', ['as' => "{$as}thread.index", 'uses' => 'ThreadController@index']);
            $router->get('recent', ['as' => "{$as}thread.recent", 'uses' => 'ThreadController@recent']);
            $router->patch('recent', ['as' => "{$as}thread.recent", 'uses' => 'ThreadController@markRecent']);
            $router->get('unread', ['as' => "{$as}thread.unread", 'uses' => 'ThreadController@unread']);
            $router->patch('unread', ['as' => "{$as}thread.unread", 'uses' => 'ThreadController@markUnread']);
            $router->post('/', ['as' => "{$as}thread.store", 'uses' => 'ThreadController@store']);
            $router->get('{thread}', ['as' => "{$as}thread.fetch", 'uses' => 'ThreadController@fetch']);
            $router->patch('{thread}', ['as' => "{$as}thread.update", 'uses' => 'ThreadController@update']);
            $router->delete('{thread}', ['as' => "{$as}thread.delete", 'uses' => 'ThreadController@destroy']);
        });

        // Posts
        $router->group(['prefix' => "{$prefix}/post"] + $options, function () use ($router, $as)
        {
            $router->get('/', ['as' => "{$as}post.index", 'uses' => 'PostController@index']);
            $router->post('/', ['as' => "{$as}post.store", 'uses' => 'PostController@store']);
            $router->get('{post}', ['as' => "{$as}post.fetch", 'uses' => 'PostController@fetch']);
            $router->patch('{post}', ['as' => "{$as}post.update", 'uses' => 'PostController@update']);
            $router->delete('{post}', ['as' => "{$as}post.delete", 'uses' => 'PostController@destroy']);
        });

        // Bulk actions

        // Categories
        $router->group(['prefix' => "{$prefix}/bulk/category"] + $options, function () use ($router, $as)
        {
            $router->patch('/', ['as' => "{$as}bulk.category.update", 'uses' => 'CategoryController@bulkUpdate']);
            $router->delete('/', ['as' => "{$as}bulk.category.delete", 'uses' => 'CategoryController@bulkDestroy']);
        });

        // Threads
        $router->group(['prefix' => "{$prefix}/bulk/thread"] + $options, function () use ($router, $as)
        {
            $router->patch('/', ['as' => "{$as}bulk.thread.update", 'uses' => 'ThreadController@bulkUpdate']);
            $router->delete('/', ['as' => "{$as}bulk.thread.delete", 'uses' => 'ThreadController@bulkDestroy']);
        });

        // Posts
        $router->group(['prefix' => "{$prefix}/bulk/post"] + $options, function () use ($router, $as)
        {
            $router->patch('/', ['as' => "{$as}bulk.post.update", 'uses' => 'PostController@bulkUpdate']);
            $router->delete('/', ['as' => "{$as}bulk.post.delete", 'uses' => 'PostController@bulkDestroy']);
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
