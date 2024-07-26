<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\PhpVersion;
use Duplexmedia\Pingback\Tests\TestCase;

class PhpVersionTest extends TestCase
{
    /**
     * @requires PHP >= 8.3
     */
    public function test_can_get_php_8_3_version()
    {
        $phpVersion = (new PhpVersion())->get();

        $this->assertStringStartsWith('8.3', $phpVersion);
    }
}
