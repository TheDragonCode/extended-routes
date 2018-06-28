<?php

namespace Helldar\ExtendedRoutes\Models;

class SoftDeletesModel extends \Illuminate\Database\Eloquent\Model
{
    public function resolveRouteBinding($value)
    {
        return (new ModelBindingResolver($this))
            ->resolve($value);
    }
}
