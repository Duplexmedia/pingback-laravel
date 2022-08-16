<?php

namespace Duplexmedia\Pingback\Components\Drivers;

class LaravelMail
{
    public function get()
    {
        return config('mail.default');
    }
}
