<?php

namespace Tests;

use DragonCode\ExtendedRoutes\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tests\Fixtures\Controller;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $this->setRoutes($app);
    }

    protected function setRoutes($app): void
    {
        $app['router']->apiRestorableResource('foos', Controller::class);
    }
}
