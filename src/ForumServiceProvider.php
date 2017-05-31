<?php

namespace AndreasElia\Forum;

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
        $this->publishes([
            __DIR__ . '/config/forum.php' => config_path('forum.php'),
        ]);

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
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
