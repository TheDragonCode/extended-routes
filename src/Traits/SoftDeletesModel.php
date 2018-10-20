<?php

namespace Helldar\ExtendedRoutes\Traits;

use Helldar\ExtendedRoutes\Routing\ModelBindingResolver;
use Illuminate\Database\Eloquent\SoftDeletes;

trait SoftDeletesModel
{
    use SoftDeletes;

    public function resolveRouteBinding($value)
    {
        return (new ModelBindingResolver($this))
            ->resolve($value);
    }
}
