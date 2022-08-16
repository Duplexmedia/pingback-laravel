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

    public function test_can_get_isLaravel6_with_correct_version()
    {
        App::shouldReceive('version')
            ->andReturn('6');

        $result = (new LaravelVersion())->isVersion6();

        $this->assertTrue($result);
    }

    public function test_can_get_isLaravel6_with_incorrect_version()
    {
        App::shouldReceive('version')
            ->andReturn('7');

        $result = (new LaravelVersion())->isVersion6();

        $this->assertFalse($result);
    }

    public function test_can_get_isGreaterThanOrEqualsVersion9_with_correct_version_9()
    {
        App::shouldReceive('version')
            ->andReturn('9');

        $result = (new LaravelVersion())->isGreaterThanOrEqualsVersion9();

        $this->assertTrue($result);
    }

    public function test_can_get_isGreaterThanOrEqualsVersion9_with_incorrect_version()
    {
        App::shouldReceive('version')
            ->andReturn('6');

        $result = (new LaravelVersion())->isGreaterThanOrEqualsVersion9();

        $this->assertFalse($result);
    }

    public function test_can_get_non_mocked_laravel_version_6()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] != 6) {
            $this->markTestSkipped();
        }

        $version = (new LaravelVersion())->get();

        $this->assertStringStartsWith('6.', $version);
    }

    public function test_can_get_non_mocked_laravel_version_7()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] != 7) {
            $this->markTestSkipped();
        }

        $version = (new LaravelVersion())->get();

        $this->assertStringStartsWith('7.', $version);
    }

    public function test_can_get_non_mocked_laravel_version_8()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] != 8) {
            $this->markTestSkipped();
        }

        $version = (new LaravelVersion())->get();

        $this->assertStringStartsWith('8.', $version);
    }

    public function test_can_get_non_mocked_laravel_version_9()
    {
        $explodedLaravelVersion = explode('.', App::version());

        if ($explodedLaravelVersion[0] != 9) {
            $this->markTestSkipped();
        }

        $version = (new LaravelVersion())->get();

        $this->assertStringStartsWith('9.', $version);
    }
}
