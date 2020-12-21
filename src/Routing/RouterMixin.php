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
     * @return \Illuminate\Routing\Router|\Helldar\ExtendedRoutes\Routing\RouterMixin
     */
    protected function getRouter(): Router
    {
        return $this;
    }
}
