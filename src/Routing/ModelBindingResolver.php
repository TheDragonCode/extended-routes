<?php

namespace Helldar\ExtendedRoutes\Routing;

use Helldar\ExtendedRoutes\Contracts\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ModelBindingResolver implements Route
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    private $model;

    /**
     * ModelBindingResolver constructor.
     *
     * @param  Model  $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param  mixed  $value
     * @param  mixed  $field
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function resolve($value, $field = null)
    {
        return $this->model
            ->where($field ?: $this->model->getRouteKeyName(), $value)
            ->when($this->needTrashed(), function ($query) {
                $query->onlyTrashed();
            })->first();
    }

    protected function needTrashed()
    {
        return $this->model->hasGlobalScope(SoftDeletingScope::class)
            && $this->trashedRoute();
    }

    protected function trashedRoute()
    {
        $route = app('router')->currentRouteName();

        return Str::endsWith($route, '.' . static::POSTFIX_RESTORE);
    }
}
