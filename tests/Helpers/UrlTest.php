<?php

namespace Duplexmedia\Pingback\Tests\Helpers;

use Duplexmedia\Pingback\Helpers\Url;
use Duplexmedia\Pingback\Tests\TestCase;

class UrlTest extends TestCase
{
    public function test_can_get_api_url()
    {
        config()->set('pingback.api.version', 'XY');
        config()->set('pingback.api.url', 'xxx.de');

        $this->assertSame('xxx.de/XY', app(Url::class)->get());
    }
}
