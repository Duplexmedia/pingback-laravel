<?php

namespace Duplexmedia\Pingback\Components\Environment;

use Illuminate\Support\Facades\App;

class LaravelEnvironment
{
    public function get(): string
    {
        return App::environment();
    }
}
