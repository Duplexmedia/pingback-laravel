<?php

namespace Duplexmedia\Pingback\Components\Environment;

class LaravelUrl
{
    public function get(): string
    {
        $url = config('app.url');

        return $this->replaceUrlProtocol($url);
    }

    private function replaceUrlProtocol(string $url): string
    {
        foreach (['http://', 'https://'] as $protocol) {
            $url = str_replace($protocol, '', $url);
        }

        return $url;
    }
}
