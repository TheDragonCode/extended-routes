<?php

namespace Helldar\ExtendedRoutes;

use Helldar\ExtendedRoutes\Routing\Router;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected $defer = false;

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->singleton('ext_route', Router::class);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return ['ext_route'];
    }
}
