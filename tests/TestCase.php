<?php

namespace Tests;

use Helldar\ExtendedRoutes\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tests\Fixtures\Controller;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
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
