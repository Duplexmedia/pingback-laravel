<?php

namespace Duplexmedia\Pingback;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class GuzzleServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind('PingbackGuzzleClient', function () {
            return app()->instance(Client::class, new Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . config('pingback.api.key'),
                ],
            ]));
        });
    }
}
