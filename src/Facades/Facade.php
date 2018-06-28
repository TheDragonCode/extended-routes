<?php

namespace Helldar\ExtendedRoutes\Facades;

class Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'ext_route';
    }
}
