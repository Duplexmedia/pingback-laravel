<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelMail;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelMailTest extends TestCase
{
    public function test_can_get_laravel_mail_driver()
    {
        $explodedLaravelVersion = explode('.', App::version());

        config()->set('mail.default', 'TestdriverMail');
        $driver = (new LaravelMail())->get();

        $this->assertSame('TestdriverMail', $driver);
    }
}
