<?php

namespace Duplexmedia\Pingback\Tests;

use Duplexmedia\Pingback\GuzzleServiceProvider;
use Duplexmedia\Pingback\PingbackServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            PingbackServiceProvider::class,
            GuzzleServiceProvider::class,
        ];
    }
}
