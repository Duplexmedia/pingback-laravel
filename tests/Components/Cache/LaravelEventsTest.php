<?php

namespace Duplexmedia\Pingback\Tests\Components\Cache;

use Duplexmedia\Pingback\Components\Cache\LaravelEvents;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelEventsTest extends TestCase
{
    public function test_can_get_disabled_laravel_events_cache()
    {
        App::shouldReceive('bootstrapPath')
            ->andReturn('nonExistingFilePath.tmp');

        $cache = (new LaravelEvents())->get();

        $this->assertFalse($cache);
    }

    public function test_can_get_enabled_laravel_events_cache()
    {
        $file = tmpfile();
        $temp_path = stream_get_meta_data($file);

        App::shouldReceive('bootstrapPath')
            ->andReturn($temp_path['uri']);

        $cache = (new LaravelEvents())->get();

        $this->assertTrue($cache);
    }
}
