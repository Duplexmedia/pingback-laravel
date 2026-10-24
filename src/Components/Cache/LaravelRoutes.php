<?php

namespace Duplexmedia\Pingback\Components\Cache;

use Illuminate\Support\Facades\App;

class LaravelRoutes
{
    public function get(): bool
    {
        return App::routesAreCached();
    }
}
