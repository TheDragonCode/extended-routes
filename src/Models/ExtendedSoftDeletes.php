<?php

namespace DragonCode\ExtendedRoutes\Models;

use DragonCode\ExtendedRoutes\Traits\ExtendedSoftDeletes as ExtendedSoftDeletesTrait;
use Illuminate\Database\Eloquent\Model;

abstract class ExtendedSoftDeletes extends Model
{
    use ExtendedSoftDeletesTrait;
}
