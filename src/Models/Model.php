<?php

namespace Helldar\ExtendedRoutes\Models;

use Helldar\ExtendedRoutes\Routing\ModelBindingResolver;

class SoftDeletesModel extends \Illuminate\Database\Eloquent\Model
{
    public function resolveRouteBinding($value)
    {
        return (new ModelBindingResolver($this))
            ->resolve($value);
    }
}
