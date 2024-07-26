<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelVersion;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelVersionTest extends TestCase
{
    public function test_can_get_laravel_version()
    {
        App::shouldReceive('version')
            ->andReturn('666.66.66');

        $version = (new LaravelVersion())->get();

        $this->assertSame('666.66.66', $version);
    }

    public function test_can_get_isGreaterThanOrEqualsVersion11_with_correct_version_11()
    {
        App::shouldReceive('version')
            ->andReturn('11');

        $result = (new LaravelVersion())->isGreaterThanOrEqualsVersion9();

        $this->assertTrue($result);
    }

    public function test_can_get_isGreaterThanOrEqualsVersion11_with_incorrect_version()
    {
        App::shouldReceive('version')
            ->andReturn('6');

        $result = (new LaravelVersion())->isGreaterThanOrEqualsVersion9();

        $this->assertFalse($result);
    }

    public function test_can_get_non_mocked_laravel_version_11()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] != 11) {
            $this->markTestSkipped();
        }

        $version = (new LaravelVersion())->get();

        $this->assertStringStartsWith('11.', $version);
    }
}
