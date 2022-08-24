<?php

namespace Duplexmedia\Pingback\Components\Drivers;

use Duplexmedia\Pingback\Components\Environment\LaravelVersion;

class LaravelMail
{
    public function get()
    {
        return config('mail.' . $this->getCorrectConfigName());
    }

    private function getCorrectConfigName(): string
    {
        $laravelVersion = new LaravelVersion();
        $name = 'default';

        if ($laravelVersion->isVersion6()) {
            $name = 'driver';
        }

        return $name;
    }
}
