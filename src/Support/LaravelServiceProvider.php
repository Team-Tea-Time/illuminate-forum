<?php namespace TeamTeaTime\Forum\Support;

use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Routing\Router;
use TeamTeaTime\Forum\Http\Middleware\APIAuth;
use TeamTeaTime\Forum\Models\Post;
use TeamTeaTime\Forum\Models\Thread;
use TeamTeaTime\Forum\Models\Observers\PostObserver;
use TeamTeaTime\Forum\Models\Observers\ThreadObserver;
use TeamTeaTime\Forum\Support\Factory;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @param  Router  $router
     * @param  GateContract  $gate
     * @return void
     */
    public function boot(Router $router, GateContract $gate)
    {
        parent::boot($router, $gate);
        $this->setPublishables();
    }

    /**
     * Register the package policies.
     *
     * @param  GateContract  $gate
     * @return void
     */
    protected function registerPolicies(GateContract $gate)
    {
        $policies = config('forum.integration.policies');

        foreach (get_class_methods(new $policies['forum']()) as $method) {
            $gate->define($method, "{$policies['forum']}@{$method}");
        }

        foreach (config('forum.integration.models') as $key => $model) {
            $gate->policy($model, $policies[$key]);
        }
    }

    /**
     * Load routes.
     *
     * @param  Router  $router
     * @return void
     */
    protected function loadRoutes(Router $router)
    {
        Factory::make('utility_class')->routes($router);
    }

    /**
     * Register middleware.
     *
     * @return void
     */
    protected function registerMiddleware(Router $router)
    {
        $router->middleware('forum.api.auth', APIAuth::class);
    }
}
