<?php

namespace Helldar\ExtendedRoutes\Models;

use Helldar\ExtendedRoutes\Traits\ExtendedSoftDeletes as ExtendedSoftDeletesTrait;
use Illuminate\Database\Eloquent\Model;

abstract class ExtendedSoftDeletes extends Model
{
    use ExtendedSoftDeletesTrait;
}
