<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelOctane
{
    public function get()
    {
        return config('octane.default');
    }
}
