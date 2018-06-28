<?php

namespace Helldar\ExtendedResourceRouter;

use Helldar\ExtendedResourceRouter\Routing\Router;
use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return Router::class;
    }
}
