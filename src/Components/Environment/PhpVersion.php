<?php

namespace Duplexmedia\Pingback\Components\Environment;

class PhpVersion
{
    public function get(): string
    {
        return phpversion();
    }
}
