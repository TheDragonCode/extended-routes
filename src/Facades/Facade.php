<?php

namespace Helldar\ExtendedRoutes\Facades;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'ext_route';
    }
}
