<?php

namespace Duplexmedia\Pingback;

use Duplexmedia\Pingback\Exceptions\MissingUuid;
use Duplexmedia\Pingback\Helpers\Url;
use GuzzleHttp\Client;

class Pingback
{
    protected array $data = [];

    private Client $client;

    public function __construct()
    {
        $this->client = app('PingbackGuzzleClient');
    }

    public function sendInformation()
    {
        throw_if(is_null(config('pingback.api.uuid')), MissingUuid::class);

        $this->client->post(app(Url::class)->get(), [
            'json' => app(GatherApplicationInformation::class)->get(),
        ]);
    }
}
