<?php

namespace Helldar\ExtendedRoutes\Traits;

use Helldar\ExtendedRoutes\Routing\ModelBindingResolver;

trait SoftDeletesModel
{
    public function resolveRouteBinding($value)
    {
        return (new ModelBindingResolver($this))
            ->resolve($value);
    }
}
