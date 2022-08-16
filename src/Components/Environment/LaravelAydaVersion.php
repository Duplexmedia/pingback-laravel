<?php

namespace Duplexmedia\Pingback\Components\Environment;

class LaravelAydaVersion
{
    public function get()
    {
        return config('ayda.version');
    }
}
