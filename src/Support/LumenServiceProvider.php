<?php namespace TeamTeaTime\Forum\Support;

use Illuminate\Contracts\Auth\Access\Gate;
use TeamTeaTime\Forum\Http\Middleware\APIAuth;
use TeamTeaTime\Forum\Models\Post;
use TeamTeaTime\Forum\Models\Thread;
use TeamTeaTime\Forum\Models\Observers\PostObserver;
use TeamTeaTime\Forum\Models\Observers\ThreadObserver;
use TeamTeaTime\Forum\Support\Factory;

class LumenServiceProvider extends ServiceProvider
{
    /**
     * Register the package policies.
     *
     * @return void
     */
    protected function registerPolicies()
    {
        $policies = config('forum.integration.policies');

        foreach (get_class_methods(new $policies['forum']()) as $method) {
            $this->app[Gate::class]->define($method, "{$policies['forum']}@{$method}");
        }

        foreach (['category', 'thread', 'post'] as $key) {
            $model = config('forum.integration.models')[$key];
            $this->app[Gate::class]->policy($model, $policies[$key]);
        }
    }

    /**
     * Load routes.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        Factory::make('utility_class')->routes(app());
    }

    /**
     * Register middleware.
     *
     * @return void
     */
    protected function registerMiddleware()
    {
        app()->routeMiddleware(['forum.api.auth' => APIAuth::class]);
    }
}
