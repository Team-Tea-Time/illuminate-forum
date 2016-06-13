<?php namespace TeamTeaTime\Forum\Support;

use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use TeamTeaTime\Forum\Http\Middleware\APIAuth;
use TeamTeaTime\Forum\Models\Post;
use TeamTeaTime\Forum\Models\Thread;
use TeamTeaTime\Forum\Models\Observers\PostObserver;
use TeamTeaTime\Forum\Models\Observers\ThreadObserver;
use TeamTeaTime\Forum\Support\Factory;

abstract class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * The base directory for the package.
     *
     * @var string
     */
    protected $baseDir;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->baseDir = __DIR__.'/../../';

        $this->loadStaticFiles();

        $this->observeModels();

        $this->registerPolicies();

        if (config('forum.routing.enabled')) {
            $this->registerMiddleware();
            $this->loadRoutes();
        }
    }

    /**
     * Define files published by this package.
     *
     * @return void
     */
    protected function setPublishables()
    {
        $this->publishes([
            "{$this->baseDir}config/integration.php" => config_path('forum.integration.php'),
            "{$this->baseDir}config/preferences.php" => config_path('forum.preferences.php'),
            "{$this->baseDir}config/routing.php" => config_path('forum.routing.php'),
            "{$this->baseDir}config/validation.php" => config_path('forum.validation.php')
        ], 'config');

        $this->publishes([
            "{$this->baseDir}migrations/" => base_path('database/migrations')
        ], 'migrations');

        $this->publishes([
            "{$this->baseDir}translations/" => base_path('resources/lang/vendor/forum'),
        ], 'translations');
    }

    /**
     * Load config, views and translations (including application-overridden versions).
     *
     * @return void
     */
    protected function loadStaticFiles()
    {
        // Merge config
        foreach (['integration', 'preferences', 'routing', 'validation'] as $name) {
            $this->mergeConfigFrom("{$this->baseDir}config/{$name}.php", "forum.{$name}");
        }

        // Load translations
        $this->loadTranslationsFrom("{$this->baseDir}translations", 'forum');
    }

    /**
     * Initialise model observers.
     *
     * @return void
     */
    protected function observeModels()
    {
        Thread::observe(new ThreadObserver);
        Post::observe(new PostObserver);
    }

    /**
     * Register the package policies.
     *
     * @return void
     */
    abstract protected function registerPolicies();

    /**
     * Load routes.
     *
     * @return void
     */
    abstract protected function loadRoutes();

    /**
     * Register middleware.
     *
     * @return void
     */
    abstract protected function registerMiddleware();
}
