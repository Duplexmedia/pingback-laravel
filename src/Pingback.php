<?php

namespace Duplexmedia\Pingback;

use Duplexmedia\Pingback\Helpers\Url;
use Psr\Http\Client\ClientInterface;

class Pingback
{
    protected array $data = [];

    private ClientInterface $client;

    public function __construct()
    {
        $this->client = app('PingbackGuzzleClient');
    }

    public function sendInformation()
    {
        $this->client->post(app(Url::class)->get(), [
            'json' => app(GatherApplicationInformation::class)->get(),
        ]);
    }
}
