<?php

namespace Duplexmedia\Pingback\Tests\Components\Drivers;

use Duplexmedia\Pingback\Components\Drivers\LaravelQueue;
use Duplexmedia\Pingback\Tests\TestCase;

class LaravelQueueTest extends TestCase
{
    public function test_can_get_laravel_queue_driver()
    {
        config()->set('queue.default', 'TestdriverQueue');
        $driver = (new LaravelQueue())->get();

        $this->assertSame('TestdriverQueue', $driver);
    }
}
