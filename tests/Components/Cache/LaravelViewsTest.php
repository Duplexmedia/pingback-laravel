<?php

namespace Duplexmedia\Pingback\Tests\Components\Cache;

use Duplexmedia\Pingback\Components\Cache\LaravelViews;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class LaravelViewsTest extends TestCase
{
    public function test_can_get_disabled_laravel_config_cache()
    {
        App::partialMock()->shouldReceive('storagePath')
            ->andReturn('nonExistingFilePath.tmp');

        $cache = (new LaravelViews())->get();

        $this->assertFalse($cache);
    }

    public function test_can_get_enabled_laravel_config_cache()
    {
        App::shouldReceive('storagePath')
            ->andReturn('vendor/orchestra/testbench-core/laravel/storage/framework/testing/disks/local/framework/views');

        $cache = (new LaravelViews())->get();

        $this->assertTrue($cache);
    }
}
