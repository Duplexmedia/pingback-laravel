<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\ComposerVersion;
use Duplexmedia\Pingback\Tests\TestCase;

class ComposerVersionTest extends TestCase
{
    public function test_can_get_composer_version()
    {
        $version = (new ComposerVersion())->get();

        $this->assertSame('2.3.10', $version);
    }
}
