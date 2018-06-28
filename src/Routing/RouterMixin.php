<?php

namespace Helldar\ExtendedRoutes\Routing;

use Illuminate\Routing\Router;

class RouterMixin
{
    public function apiRestorableResource()
    {
        return function ($name, $controller, array $options = []) {
            $only = ['index', 'trashed', 'show', 'store', 'update', 'destroy', 'restore'];

            if (isset($options['except'])) {
                $only = array_diff($only, (array) $options['except']);
            }

            /** @var Router $router */
            $router = $this;

            return $router->resource($name, $controller, array_merge([
                'only' => $only,
            ], $options));
        };
    }
}
