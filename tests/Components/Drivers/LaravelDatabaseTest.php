<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelDatabase;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelDatabaseTest extends TestCase
{
    public function test_can_get_laravel_database_driver()
    {
        config()->set('database.connections.TestdriverDatabase',
            config('database.connections.'.config('database.default')));
        config()->set('database.default', 'TestdriverDatabase');
        $driver = (new LaravelDatabase())->get();

        $this->assertSame('TestdriverDatabase', $driver);
    }
}
