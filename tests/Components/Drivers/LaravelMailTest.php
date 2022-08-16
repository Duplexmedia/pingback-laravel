<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelMail;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelMailTest extends TestCase
{
    public function test_can_get_laravel_mail_driver()
    {
        config()->set('mail.default', 'TestdriverMail');
        $driver = (new LaravelMail())->get();

        $this->assertSame('TestdriverMail', $driver);
    }

    public function test_laravel_mail_driver_can_be_null()
    {
        config()->set('mail.default', null);
        $driver = (new LaravelMail())->get();

        $this->assertNull($driver);
    }
}
