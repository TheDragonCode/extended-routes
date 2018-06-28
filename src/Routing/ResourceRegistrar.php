<?php

namespace Helldar\ExtendedRoutes\Routing;

use Illuminate\Routing\ResourceRegistrar as IlluminateResourceRegistrar;

class ResourceRegistrar extends IlluminateResourceRegistrar
{
    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'restore', 'deleted'];

    /**
     * Add the index method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     *
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDeleted($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . "/{$base}/deleted";

        $action = $this->getResourceAction($name, $controller, 'deleted', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the destroy method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array  $options
     *
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . "/{$base}/restore";

        $action = $this->getResourceAction($name, $controller, 'restore', $options);

        return $this->router->post($uri, $action);
    }
}
