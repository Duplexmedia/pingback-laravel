<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelScout
{
    public function get()
    {
        return config('scout.default');
    }
}
