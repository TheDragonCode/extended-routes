<?php

namespace DragonCode\ExtendedRoutes\Traits;

use DragonCode\ExtendedRoutes\Routing\ModelBindingResolver;
use Illuminate\Database\Eloquent\SoftDeletes;

trait ExtendedSoftDeletes
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return app(ModelBindingResolver::class, ['model' => $this])
            ->resolve($value, $field);
    }
}
