<?php

namespace Helldar\ExtendedRoutes\Routing;

class Router extends \Illuminate\Routing\Router
{
    /**
     * Route an API resource to a controller.
     *
     * @param string $name
     * @param string $controller
     * @param array $options
     *
     * @return \Illuminate\Routing\PendingResourceRegistration
     */
    public function apiResource($name, $controller, array $options = [])
    {
        $only = ['index', 'show', 'store', 'update', 'destroy', 'restore', 'deleted'];

        if (isset($options['except'])) {
            $only = array_diff($only, (array) $options['except']);
        }

        return $this->resource($name, $controller, array_merge([
            'only' => $only,
        ], $options));
    }
}
