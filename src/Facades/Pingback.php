<?php

namespace Duplexmedia\Pingback\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Duplexmedia\Pingback\Pingback
 */
class Pingback extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pingback';
    }
}
