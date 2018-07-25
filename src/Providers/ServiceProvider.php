<?php

namespace Munish\Qtum\Providers;

use Munish\Qtum\Client as QtumClient;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('qtumd.php')], 'config');
        $this->mergeConfigFrom($path, 'qtumd');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();

        $this->registerClient();
    }

    /**
     * Register aliases.
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'qtumd' => 'Munish\Qtum\Client',
        ];

        foreach ($aliases as $key => $aliases) {
            foreach ((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }

    /**
     * Register client.
     *
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton('qtumd', function ($app) {
            return new QtumClient([
                'scheme' => $app['config']->get('qtumd.scheme', 'http'),
                'host'   => $app['config']->get('qtumd.host', 'localhost'),
                'port'   => $app['config']->get('qtumd.port', 8332),
                'user'   => $app['config']->get('qtumd.user'),
                'pass'   => $app['config']->get('qtumd.password'),
                'ca'     => $app['config']->get('qtumd.ca'),
            ]);
        });
    }
}
