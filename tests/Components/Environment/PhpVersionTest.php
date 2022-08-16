<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\PhpVersion;
use Duplexmedia\Pingback\Tests\TestCase;

class PhpVersionTest extends TestCase
{
    /**
     * @requires PHP >= 7.4
     * @requires PHP <= 8.1
     */
    public function test_can_get_php_7_4_version()
    {
        $phpVersion = (new PhpVersion())->get();

        $this->assertStringStartsWith('7.4', $phpVersion);
    }

    /**
     * @requires PHP >= 8.1
     */
    public function test_can_get_php_8_1_version()
    {
        $phpVersion = (new PhpVersion())->get();

        $this->assertStringStartsWith('8.1', $phpVersion);
    }
}
