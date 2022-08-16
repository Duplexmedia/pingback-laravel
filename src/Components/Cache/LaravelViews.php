<?php

namespace Duplexmedia\Pingback\Components\Cache;

use Illuminate\Support\Facades\App;

class LaravelViews
{
    public function get(): bool
    {
        return $this->hasPhpFiles(App::storagePath('framework/views'));
    }

    private function hasPhpFiles(string $path): bool
    {
        return count(glob($path.'/*.php')) > 0;
    }
}
