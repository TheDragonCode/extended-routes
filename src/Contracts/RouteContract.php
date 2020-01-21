<?php

namespace Helldar\ExtendedRoutes\Contracts;

interface RouteContract
{
    const API_METHODS = ['index', 'trashed', 'show', 'store', 'update', 'destroy', 'restore'];

    const POSTFIX_RESTORE = 'restore';

    const POSTFIX_TRASHED = 'trashed';

    const WEB_METHODS = ['index', 'trashed', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'restore'];
}
