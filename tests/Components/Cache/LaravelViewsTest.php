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
        $storagePath = sys_get_temp_dir().'/pingback-views-'.uniqid();
        mkdir($storagePath.'/framework/views', 0777, true);
        file_put_contents($storagePath.'/framework/views/compiled.php', '<?php');

        App::shouldReceive('storagePath')
            ->andReturn($storagePath.'/framework/views');

        try {
            $cache = (new LaravelViews())->get();
        } finally {
            unlink($storagePath.'/framework/views/compiled.php');
            rmdir($storagePath.'/framework/views');
            rmdir($storagePath.'/framework');
            rmdir($storagePath);
        }

        $this->assertTrue($cache);
    }
}
