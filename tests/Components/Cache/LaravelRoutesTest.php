<?php

namespace Duplexmedia\Pingback\Tests\Components\Cache;

use Duplexmedia\Pingback\Components\Cache\LaravelRoutes;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelRoutesTest extends TestCase
{
    protected function tearDown(): void
    {
        $this->removeRoutesCache();

        parent::tearDown();
    }

    public function test_can_get_disabled_laravel_routes_cache()
    {
        $this->removeRoutesCache();
        $this->forgetMemoizedRoutesCacheState();
        $cache = (new LaravelRoutes())->get();

        $this->assertFalse($cache);
    }

    public function test_can_get_enabled_laravel_routes_cache()
    {
        $path = App::getCachedRoutesPath();

        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        try {
            file_put_contents($path, '<?php');
            $this->forgetMemoizedRoutesCacheState();
            $cache = (new LaravelRoutes())->get();
        } finally {
            $this->removeRoutesCache();
        }

        $this->assertTrue($cache);
    }

    /**
     * Newer Laravel versions memoize the result of routesAreCached() in the
     * container while the application boots, so reset it after changing the file.
     */
    private function forgetMemoizedRoutesCacheState(): void
    {
        $this->app->forgetInstance('routes.cached');
    }

    private function removeRoutesCache(): void
    {
        $path = App::getCachedRoutesPath();

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
