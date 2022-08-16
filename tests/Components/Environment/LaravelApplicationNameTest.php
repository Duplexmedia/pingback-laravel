<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelApplicationName;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelApplicationNameTest extends TestCase
{
    public function test_can_get_laravel_application_name()
    {
        config()->set('app.name', 'Testname');
        $name = (new LaravelApplicationName())->get();

        $this->assertSame('Testname', $name);
    }
}
