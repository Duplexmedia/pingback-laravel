<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelDebugMode;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelDebugModeTest extends TestCase
{
    public function test_can_get_disabled_laravel_debug_mode()
    {
        config()->set('app.debug', false);

        $debugMode = (new LaravelDebugMode())->get();

        $this->assertFalse($debugMode);
    }

    public function test_can_get_enabled_laravel_debug_mode()
    {
        config()->set('app.debug', true);

        $debugMode = (new LaravelDebugMode())->get();

        $this->assertTrue($debugMode);
    }
}
