<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelBroadcasting
{
    public function get(): string
    {
        return config('broadcasting.default');
    }
}
