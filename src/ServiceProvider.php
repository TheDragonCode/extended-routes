<?php

namespace DragonCode\ExtendedRoutes;

use DragonCode\ExtendedRoutes\Routing\ExtendedResourceRegistrar;
use DragonCode\ExtendedRoutes\Routing\RouterMixin;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;

class ServiceProvider extends RouteServiceProvider
{
    public function register()
    {
        $this->registerResourceRegistrar();
        $this->registerRouterMacro();
    }

    protected function registerResourceRegistrar()
    {
        $this->app->bind(ResourceRegistrar::class, ExtendedResourceRegistrar::class);
    }

    protected function registerRouterMacro()
    {
        Router::mixin($this->mixin());
    }

    protected function mixin()
    {
        return app(RouterMixin::class);
    }
}
