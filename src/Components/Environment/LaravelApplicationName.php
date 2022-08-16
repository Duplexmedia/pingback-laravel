<?php

namespace Duplexmedia\Pingback\Components\Environment;

class LaravelApplicationName
{
    public function get(): string
    {
        return config('app.name');
    }
}
