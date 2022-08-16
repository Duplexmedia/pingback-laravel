<?php

namespace Duplexmedia\Pingback\Components\Cache;

use Illuminate\Support\Facades\App;

class LaravelEvents
{
    public function get(): bool
    {
        return file_exists(App::bootstrapPath('cache/events.php'));
    }
}
