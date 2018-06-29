<?php

namespace Helldar\ExtendedRoutes\Models;

use Helldar\ExtendedRoutes\Traits\SoftDeletesModel as SoftDeletesModelTrait;

class SoftDeletesModel extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletesModelTrait;
}
