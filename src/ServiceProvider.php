<?php

namespace Helldar\ExtendedResourceRouter;

use Helldar\ExtendedResourceRouter\Routing\Router;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected $defer = true;

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->singleton('ext_router', Router::class);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return ['ext_router'];
    }
}
