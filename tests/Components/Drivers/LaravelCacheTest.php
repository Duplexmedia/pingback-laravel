<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelCache;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelCacheTest extends TestCase
{
    public function test_can_get_laravel_cache_driver()
    {
        config()->set('cache.default', 'TestdriverCache');
        $driver = (new LaravelCache())->get();

        $this->assertSame('TestdriverCache', $driver);
    }
}
