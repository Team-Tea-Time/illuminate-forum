<?php

namespace Bitporch\Forum;

use Bitporch\Forum\Console\InstallCommand;
use Bitporch\Forum\Models\Discussion;
use Bitporch\Forum\Models\Group;
use Bitporch\Forum\Models\Post;
use Bitporch\Forum\Observers\DiscussionObserver;
use Bitporch\Forum\Observers\PostObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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
                InstallCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../config/forum.php' => config_path('forum.php'),
        ], 'config');

        $this->registerRouteBindings();
        $this->registerPackageNamespaces();
        $this->registerModelObservers();
        $this->registerBladeDirectives();

        View::composer('*', 'Bitporch\Forum\ViewComposers\GroupComposer');
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
     * Register route bindings for models. We don't need to do this since we're following
     * the conventions by which route model bindings will happen automatically,
     * but this makes it obvious that the package relies on it.
     *
     * @return void
     */
    public function registerRouteBindings()
    {
        Route::model('discussion', Discussion::class);
        Route::model('group', Group::class);
        Route::model('post', Post::class);
    }

    /**
     * Define the application migrations, routes, views and translations.
     *
     * @return void
     */
    public function registerPackageNamespaces()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'forum');
        $this->loadTranslationsFrom(__DIR__.'/../resources/translations', 'forum');
    }

    /**
     * Register the model observers.
     *
     * @return void
     */
    public function registerModelObservers()
    {
        Discussion::observe(DiscussionObserver::class);
        Post::observe(PostObserver::class);
    }

    /**
     * @return void
     */
    public function registerBladeDirectives()
    {
        Blade::directive('is_selected', function ($expected, $actual) {
            return ($expected == $actual) ? 'selected' : '';
        });
        Blade::directive('error', function ($type) {
            return '<?php
                if($errors->has($type)) {
                    echo "<span class=\"help-block\">
                        <strong>{{ $errors->first($type) }}</strong>
                    </span>";
                }
                ?>
            ';
        });
    }
}
