<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelCache
{
    public function get(): string
    {
        return config('cache.default');
    }
}
