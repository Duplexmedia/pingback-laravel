<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelQueue
{
    public function get(): string
    {
        return config('queue.default');
    }
}
