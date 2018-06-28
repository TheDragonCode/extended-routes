<?php

namespace Helldar\ExtendedRoutes;

use Helldar\ExtendedRoutes\Routing\ResourceRegistrar as ExtendedResourceRegistrar;
use Illuminate\Routing\ResourceRegistrar as IlluminateResourceRegistrar;
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
        $this->app->bind(IlluminateResourceRegistrar::class, ExtendedResourceRegistrar::class);
    }
}
