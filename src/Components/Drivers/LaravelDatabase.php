<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelDatabase
{
    public function get(): string
    {
        return config('database.default');
    }
}
