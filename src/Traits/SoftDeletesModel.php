<?php

namespace Helldar\ExtendedRoutes\Traits;

use Helldar\ExtendedRoutes\Routing\ModelBindingResolver;
use Illuminate\Database\Eloquent\SoftDeletes;

trait SoftDeletesModel
{
    use SoftDeletes;

    /**
     * @param $value
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function resolveRouteBinding($value)
    {
        return (new ModelBindingResolver($this))
            ->resolve($value);
    }
}
