<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelSession;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelSessionTest extends TestCase
{
    public function test_can_get_laravel_session_driver()
    {
        config()->set('session.driver', 'TestdriverSession');
        $driver = (new LaravelSession())->get();

        $this->assertSame('TestdriverSession', $driver);
    }

    public function test_laravel_session_driver_can_be_null()
    {
        config()->set('session.driver', null);
        $driver = (new LaravelSession())->get();

        $this->assertNull($driver);
    }
}
