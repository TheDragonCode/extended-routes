<?php

namespace Helldar\ExtendedResourceRouter\Routing;

use Illuminate\Routing\PendingResourceRegistration;
use Illuminate\Routing\Router as IlluminateRouter;

class Router extends IlluminateRouter
{
    /**
     * Route an API resource to a controller.
     *
     * @param  string $name
     * @param  string $controller
     * @param  array $options
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

    /**
     * Route a resource to a controller.
     *
     * @param  string $name
     * @param  string $controller
     * @param  array $options
     *
     * @return \Illuminate\Routing\PendingResourceRegistration
     */
    public function resource($name, $controller, array $options = [])
    {
        if ($this->container && $this->container->bound(ResourceRegistrar::class)) {
            $registrar = $this->container->make(ResourceRegistrar::class);
        }
        else {
            $registrar = new ResourceRegistrar($this);
        }

        return new PendingResourceRegistration(
            $registrar, $name, $controller, $options
        );
    }
}
