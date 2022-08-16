<?php

namespace Duplexmedia\Pingback\Components\Environment;

use Illuminate\Support\Facades\App;

class LaravelMaintenanceMode
{
    public function get(): bool
    {
        return App::isDownForMaintenance();
    }
}
