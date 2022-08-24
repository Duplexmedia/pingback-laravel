<?php

namespace Duplexmedia\Pingback\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Mockery;

class PingbackSendCommandTest extends TestCase
{
    public function test_run_pingback_send_command()
    {
        $mock = new MockHandler([new Response(200, [], null)]);
        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handler]);
        app()->bind('PingbackGuzzleClient', function () use ($guzzleClient) {
            return Mockery::mock('PingbackGuzzleClient', $guzzleClient);
        });

        $this->artisan('pingback:send')->assertExitCode(0);
    }
}
