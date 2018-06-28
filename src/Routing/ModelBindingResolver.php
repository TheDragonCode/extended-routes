<?php

namespace Helldar\ExtendedRoutes\Routing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModelBindingResolver
{
    /**
     * @var \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    private $model;

    /**
     * ModelBindingResolver constructor.
     *
     * @param Model $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function resolve($value)
    {
        return $this->model
            ->where($this->model->getRouteKeyName(), $value)
            ->when($this->needTrashed(), function ($q) {
                $q->onlyTrashed();
            })
            ->first();
    }

    protected function needTrashed()
    {
        return $this->model->hasGlobalScope(SoftDeletingScope::class)
            && $this->trashedRoute();
    }

    protected function trashedRoute()
    {
        $route = (string) app('router')->currentRouteName();

        return ends_with($route, '.restore');
    }
}
