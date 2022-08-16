<?php

namespace Duplexmedia\Pingback\Tests\Components\Cache;

use Duplexmedia\Pingback\Components\Cache\LaravelConfig;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelConfigTest extends TestCase
{
    public function test_can_get_disabled_laravel_config_cache()
    {
        App::shouldReceive('bootstrapPath')
            ->andReturn('nonExistingFilePath.tmp');

        $cache = (new LaravelConfig())->get();

        $this->assertFalse($cache);
    }

    public function test_can_get_enabled_laravel_config_cache()
    {
        $file = tmpfile();
        $temp_path = stream_get_meta_data($file);

        App::shouldReceive('bootstrapPath')
            ->andReturn($temp_path['uri']);

        $cache = (new LaravelConfig())->get();

        $this->assertTrue($cache);
    }
}
