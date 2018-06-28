<?php

namespace Helldar\ExtendedRoutes;

use Helldar\ExtendedRoutes\Routing\ResourceRegistrar as ExtendedResourceRegistrar;
use Helldar\ExtendedRoutes\Routing\Router as ExtendedRouter;
use Illuminate\Routing\ResourceRegistrar as IlluminateResourceRegistrar;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->app->bind(IlluminateResourceRegistrar::class, ExtendedResourceRegistrar::class);

        $this->app->singleton('router', function ($app) {
            return new ExtendedRouter($app['events'], $app);
        });
    }
}
