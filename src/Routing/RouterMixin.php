<?php

namespace Helldar\ExtendedRoutes\Routing;

use Helldar\ExtendedRoutes\Contracts\Route;
use Illuminate\Routing\Router;

/** @mixin \Illuminate\Routing\Router */
class RouterMixin
{
    /**
     * Getting Route API.
     *
     * @return \Closure
     */
    public function apiRestorableResource()
    {
        return function ($name, $controller, array $options = []) {
            $only = isset($options['except'])
                ? array_diff(Route::API_METHODS, (array) $options['except'])
                : Route::API_METHODS;

            return $this->getRouter()->resource(
                $name,
                $controller,
                array_merge(compact('only'), $options)
            );
        };
    }

    /**
     * @return \Helldar\ExtendedRoutes\Routing\RouterMixin|\Illuminate\Routing\Router
     */
    protected function getRouter(): Router
    {
        return $this;
    }
}
