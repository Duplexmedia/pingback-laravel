<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelScout;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelScoutTest extends TestCase
{
    public function test_can_get_laravel_scout_driver()
    {
        config()->set('scout.default', 'TestdriverScout');
        $driver = (new LaravelScout())->get();

        $this->assertSame('TestdriverScout', $driver);
    }

    public function test_laravel_scout_driver_can_be_null()
    {
        config()->set('scout.default', null);
        $driver = (new LaravelScout())->get();

        $this->assertNull($driver);
    }
}
