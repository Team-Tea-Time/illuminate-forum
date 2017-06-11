<?php

namespace AndreasElia\Forum;

use AndreasElia\Forum\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class ForumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
        }

        $this->publishes([
            __DIR__.'/../config/forum.php' => config_path('forum.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->setupRoutes();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define the application routes.
     *
     * @return void
     */
    public function setupRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
