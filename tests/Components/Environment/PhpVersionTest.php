<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\PhpVersion;
use Duplexmedia\Pingback\Tests\TestCase;

class PhpVersionTest extends TestCase
{
    public function test_can_get_php_version()
    {
        $phpVersion = (new PhpVersion())->get();

        $this->assertSame(PHP_VERSION, $phpVersion);
    }
}
