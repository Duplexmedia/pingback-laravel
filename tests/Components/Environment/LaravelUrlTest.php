<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelUrl;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelUrlTest extends TestCase
{
    public function test_can_get_laravel_url()
    {
        config()->set('app.url', 'www.google.com');
        $url = (new LaravelUrl())->get();

        $this->assertSame('www.google.com', $url);
    }

    public function test_can_get_laravel_url_without_protocol_http()
    {
        config()->set('app.url', 'http://www.google.com');
        $url = (new LaravelUrl())->get();

        $this->assertSame('www.google.com', $url);
    }

    public function test_can_get_laravel_url_without_protocol_https()
    {
        config()->set('app.url', 'https://www.google.com');
        $url = (new LaravelUrl())->get();

        $this->assertSame('www.google.com', $url);
    }
}
