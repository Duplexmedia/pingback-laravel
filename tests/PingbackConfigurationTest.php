<?php

namespace Duplexmedia\Pingback\Tests;

use Illuminate\Support\Str;

class PingbackConfigurationTest extends TestCase
{
    public function test_api_url_has_no_trailing_slash()
    {
        $this->assertFalse(Str::endsWith(config('pingback.api.url'), '/'));
    }

    public function test_api_url_is_set()
    {
        config()->set('pingback.api.url', 'xxx.de');

        $this->assertSame('xxx.de', config('pingback.api.url'));
    }

    public function test_api_version_is_set()
    {
        config()->set('pingback.api.version', 'XY');

        $this->assertSame('XY', config('pingback.api.version'));
    }

    public function test_api_key_is_set()
    {
        config()->set('pingback.api.key', 'XXXXX');

        $this->assertSame('XXXXX', config('pingback.api.key'));
    }

    public function test_api_key_is_null_on_default()
    {
        $this->assertNull(config('pingback.api.key'));
    }
}
