<?php

namespace AndreasElia\Tests;

use AndreasElia\Forum\ForumServiceProvider;
use AndreasElia\Tests\stubs\models\User\User;
use Orchestra\Database\ConsoleServiceProvider;
use Orchestra\Testbench\BrowserKit\TestCase;

class IntegrationTestCase extends TestCase
{
    /**
     * Load package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ForumServiceProvider::class, ConsoleServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'    => 'sqlite',
            'database'  => ':memory:',
            'prefix'    => '',
        ]);
        $app['config']->set('forum.user', User::class);
        $app['config']->set('forum.prefix', 'forum');
        $app['config']->set('forum.namespace', '\AndreasElia\Forum\Controllers');
    }

    protected function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testbench']);
        $this->withFactories(__DIR__.'/../database/factories/');
        $this->stubs();
    }

    private function stubs()
    {
        $this->loadMigrationsFrom(__DIR__.'/stubs/migrations');
    }
}
