<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelOctane;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelOctaneTest extends TestCase
{
    public function test_can_get_laravel_octane_driver()
    {
        config()->set('octane.default', 'TestdriverOctane');
        $driver = (new LaravelOctane())->get();

        $this->assertSame('TestdriverOctane', $driver);
    }

    public function test_can_get_laravel_octane_driver_without_octane_config()
    {
        $driver = (new LaravelOctane())->get();

        $this->assertNull($driver);
    }
}
