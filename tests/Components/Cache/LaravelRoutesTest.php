<?php

namespace Duplexmedia\Pingback\Tests\Components\Cache;

use Duplexmedia\Pingback\Components\Cache\LaravelRoutes;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelRoutesTest extends TestCase
{
    public function test_can_get_disabled_laravel_routes_cache()
    {
        App::partialMock()->shouldReceive('bootstrapPath')->andReturn('nonExistingFilePath.tmp');
        $cache = (new LaravelRoutes())->get();

        $this->assertFalse($cache);
    }

    public function test_can_get_enabled_laravel_routes_cache()
    {
        $file = tmpfile();
        $temp_path = stream_get_meta_data($file);
        App::partialMock()->shouldReceive('bootstrapPath')->andReturn($temp_path['uri']);
        $cache = (new LaravelRoutes())->get();

        $this->assertTrue($cache);
    }
}
