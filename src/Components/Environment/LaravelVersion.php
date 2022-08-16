<?php

namespace Duplexmedia\Pingback\Components\Environment;

use Illuminate\Support\Facades\App;

class LaravelVersion
{
    const VERSION_6 = 6;
    const VERSION_9 = 9;

    public function get(): string
    {
        return App::version();
    }

    public function isVersion6(): bool
    {
        return $this->getMainLaravelVersion() === self::VERSION_6;
    }

    public function isGreaterThanOrEqualsVersion9(): bool
    {
        return $this->getMainLaravelVersion() >= self::VERSION_9;
    }

    private function getMainLaravelVersion(): int
    {
        $version = $this->get();
        $versionsNumbersExploded = explode('.', $version);

        return (int) $versionsNumbersExploded[0];
    }
}
