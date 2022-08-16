<?php

namespace Duplexmedia\Pingback\Tests;

use Duplexmedia\Pingback\GatherApplicationInformation;
use Duplexmedia\Pingback\Helpers\Url;
use Duplexmedia\Pingback\Pingback;
use GuzzleHttp\Client;
use Mockery;

class PingbackTest extends TestCase
{
    public function test_can_sendInformation()
    {
        $this->mock(GatherApplicationInformation::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn(['xInformationArray']);
        });

        $this->mock(Url::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('__url__');
        });

        app()->bind('PingbackGuzzleClient', function () {
            return $this->mock(Client::class, function (Mockery\MockInterface $mock) {
                $mock->shouldReceive('post')->withArgs([
                    '__url__', [
                        'json' => app(GatherApplicationInformation::class)->get()
                    ]
                ])->once();
            });
        });

        $pingback = new Pingback();
        $pingback->sendInformation();
    }
}
