<?php

namespace Helldar\ExtendedRoutes\Routing;

use Helldar\ExtendedRoutes\Contracts\RouteContract;

class RouterMixin
{
    /**
     * Getting Route API
     *
     * @return \Closure
     */
    public function apiRestorableResource()
    {
        return function ($name, $controller, array $options = []) {
            /** @var \Illuminate\Routing\Router $router */
            $router = $this;

            $only = isset($options['except'])
                ? array_diff(RouteContract::API_METHODS, (array) $options['except'])
                : RouteContract::API_METHODS;

            return $router->resource(
                $name,
                $controller,
                array_merge(compact('only'), $options)
            );
        };
    }
}
