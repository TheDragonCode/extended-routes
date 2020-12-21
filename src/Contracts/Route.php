<?php

namespace Helldar\ExtendedRoutes\Contracts;

interface Route
{
    public const API_METHODS = ['index', 'trashed', 'show', 'store', 'update', 'destroy', 'restore'];

    public const POSTFIX_RESTORE = 'restore';

    public const POSTFIX_TRASHED = 'trashed';

    public const WEB_METHODS = ['index', 'trashed', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'restore'];
}
