<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelMail;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelMailTest extends TestCase
{
    public function test_can_get_laravel_mail_driver_for_laravel_greater_than_6()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] == 6) {
            $this->markTestSkipped();
        }

        config()->set('mail.default', 'TestdriverMail');
        $driver = (new LaravelMail())->get();

        $this->assertSame('TestdriverMail', $driver);
    }

    public function test_can_get_laravel_mail_driver_for_laravel_6()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] != 6) {
            $this->markTestSkipped();
        }

        config()->set('mail.driver', 'TestdriverMail');
        $driver = (new LaravelMail())->get();

        $this->assertSame('TestdriverMail', $driver);
    }
}
