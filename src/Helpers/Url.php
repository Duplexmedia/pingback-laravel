<?php

namespace Duplexmedia\Pingback\Helpers;

class Url
{
    public function get(): string
    {
        return config('pingback.api.url') . '/' . config('pingback.api.version');
    }
}
