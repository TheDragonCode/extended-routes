<?php

namespace DragonCode\ExtendedRoutes\Routing;

use DragonCode\ExtendedRoutes\Contracts\Route;
use Illuminate\Routing\ResourceRegistrar;

class ExtendedResourceRegistrar extends ResourceRegistrar implements Route
{
    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = self::WEB_METHODS;

    /**
     * Add the index method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array $options
     *
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceTrashed($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/' . static::POSTFIX_TRASHED;

        $action = $this->getResourceAction($name, $controller, static::POSTFIX_TRASHED, $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the destroy method for a resourceful route.
     *
     * @param string $name
     * @param string $base
     * @param string $controller
     * @param array $options
     *
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/{' . $base . '}/' . static::POSTFIX_RESTORE;

        $action = $this->getResourceAction($name, $controller, static::POSTFIX_RESTORE, $options);

        return $this->router->post($uri, $action);
    }
}
