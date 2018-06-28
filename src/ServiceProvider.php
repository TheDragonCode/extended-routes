<?php

namespace Helldar\ExtendedRoutes;

use Helldar\ExtendedRoutes\Routing\ExtendedResourceRegistrar;
use Helldar\ExtendedRoutes\Routing\RouterMixin;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;

class ServiceProvider extends RouteServiceProvider
{
    /**
     * Register the service provider.
     *
     * @throws \ReflectionException
     */
    public function register()
    {
        $this->registerResourceRegistrar();
        $this->registerRouterMacro();
    }

    /**
     * Register resource registrar.
     */
    protected function registerResourceRegistrar()
    {
        $this->app->bind(ResourceRegistrar::class, ExtendedResourceRegistrar::class);
    }

    /**
     *  Add macro to router.
     *
     * @throws \ReflectionException
     */
    protected function registerRouterMacro()
    {
        Router::mixin(new RouterMixin());
    }
}
