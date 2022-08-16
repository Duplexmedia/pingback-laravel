<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelBroadcasting;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelBroadcastingTest extends TestCase
{
    public function test_can_get_laravel_broadcasting_driver()
    {
        config()->set('broadcasting.default', 'TestdriverBroadcasting');
        $driver = (new LaravelBroadcasting())->get();

        $this->assertSame('TestdriverBroadcasting', $driver);
    }
}
