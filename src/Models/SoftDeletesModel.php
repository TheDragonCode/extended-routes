<?php

namespace Helldar\ExtendedRoutes\Models;

use Helldar\ExtendedRoutes\Traits\SoftDeletesModel as SoftDeletesModelTrait;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class SoftDeletesModel extends EloquentModel
{
    use SoftDeletesModelTrait;
}
