<?php

namespace Duplexmedia\Pingback\Components\Cache;

use Duplexmedia\Pingback\Components\Environment\LaravelVersion;
use Illuminate\Support\Facades\App;

class LaravelRoutes
{
    public function get(): bool
    {
        $cacheFilename = $this->getCorrectFilename();

        return file_exists(App::bootstrapPath('cache/ '.$cacheFilename.' .php'));
    }

    private function getCorrectFilename(): string
    {
        $laravelVersion = new LaravelVersion();
        $cacheFilename = 'routes-v7';

        if ($laravelVersion->isVersion6()) {
            $cacheFilename = 'routes';
        }

        return $cacheFilename;
    }
}
