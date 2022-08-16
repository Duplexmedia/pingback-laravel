<?php

namespace Duplexmedia\Pingback\Components\Environment;

class LaravelDebugMode
{
    public function get(): bool
    {
        return config('app.debug');
    }
}
