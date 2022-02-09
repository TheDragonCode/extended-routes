<?php

namespace DragonCode\ExtendedRoutes\Routing;

use Closure;
use DragonCode\ExtendedRoutes\Contracts\Route;

/** @mixin \Illuminate\Routing\Router */
class RouterMixin
{
    /**
     * Getting Route API.
     *
     * @return Closure
     */
    public function apiRestorableResource()
    {
        return function ($name, $controller, array $options = []) {
            /** @var \DragonCode\ExtendedRoutes\Routing\RouterMixin|\Illuminate\Routing\Router $router */
            $router = $this;

            $only = isset($options['except'])
                ? array_diff(Route::API_METHODS, (array) $options['except'])
                : Route::API_METHODS;

            return $router->resource(
                $name,
                $controller,
                array_merge(compact('only'), $options)
            );
        };
    }
}
