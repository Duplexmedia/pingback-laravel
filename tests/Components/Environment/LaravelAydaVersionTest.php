<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelAydaVersion;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelAydaVersionTest extends TestCase
{
    public function test_can_get_laravel_url()
    {
        config()->set('ayda.version', '2.0.0-beta.5');
        $version = (new LaravelAydaVersion())->get();

        $this->assertSame('2.0.0-beta.5', $version);
    }

    public function test_laravel_ayda_version_can_be_null()
    {
        config()->set('ayda.version', null);
        $version = (new LaravelAydaVersion())->get();

        $this->assertNull($version);
    }
}
