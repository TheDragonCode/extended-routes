<?php

namespace Helldar\ExtendedRoutes\Routing;

use Helldar\ExtendedRoutes\Contracts\RouteContract;

class RouterMixin implements RouteContract
{
    /**
     * Getting Route API
     *
     * @return \Closure
     */
    public function apiRestorableResource()
    {
        return function ($name, $controller, array $options = []) {
            return $this
                ->getRouter()
                ->resource($name, $controller, $this->options($options));
        };
    }

    /**
     * Getting a list of allowed methods.
     *
     * @param array $options
     *
     * @return array
     */
    protected function filterMethods(array $options = [])
    {
        return isset($options['except'])
            ? array_diff(static::API_METHODS, (array) $options['except'])
            : static::API_METHODS;
    }

    protected function options(array $options = [])
    {
        return array_merge(
            ['only' => $this->filterMethods($options)],
            $options
        );
    }

    /**
     * Getting a Route Instance.
     *
     * @return \Helldar\ExtendedRoutes\Routing\RouterMixin|\Illuminate\Routing\Router
     */
    protected function getRouter()
    {
        return $this;
    }
}
