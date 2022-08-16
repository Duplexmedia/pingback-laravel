<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelEnvironment;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelEnvironmentTest extends TestCase
{
    public function test_can_get_laravel_environment()
    {
        App::shouldReceive('environment')
            ->andReturn('xxx');

        $environment = (new LaravelEnvironment())->get();

        $this->assertSame('xxx', $environment);
    }
}
