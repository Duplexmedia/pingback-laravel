<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelSession
{
    public function get()
    {
        return config('session.default');
    }
}
