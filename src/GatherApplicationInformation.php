<?php

namespace Duplexmedia\Pingback;

use Duplexmedia\Pingback\Components\Cache\LaravelConfig;
use Duplexmedia\Pingback\Components\Cache\LaravelEvents;
use Duplexmedia\Pingback\Components\Cache\LaravelRoutes;
use Duplexmedia\Pingback\Components\Cache\LaravelViews;
use Duplexmedia\Pingback\Components\Drivers\LaravelBroadcasting;
use Duplexmedia\Pingback\Components\Drivers\LaravelCache;
use Duplexmedia\Pingback\Components\Drivers\LaravelDatabase;
use Duplexmedia\Pingback\Components\Drivers\LaravelMail;
use Duplexmedia\Pingback\Components\Drivers\LaravelOctane;
use Duplexmedia\Pingback\Components\Drivers\LaravelQueue;
use Duplexmedia\Pingback\Components\Drivers\LaravelScout;
use Duplexmedia\Pingback\Components\Drivers\LaravelSession;
use Duplexmedia\Pingback\Components\Environment\ComposerVersion;
use Duplexmedia\Pingback\Components\Environment\LaravelApplicationName;
use Duplexmedia\Pingback\Components\Environment\LaravelDebugMode;
use Duplexmedia\Pingback\Components\Environment\LaravelEnvironment;
use Duplexmedia\Pingback\Components\Environment\LaravelMaintenanceMode;
use Duplexmedia\Pingback\Components\Environment\LaravelUrl;
use Duplexmedia\Pingback\Components\Environment\LaravelVersion;
use Duplexmedia\Pingback\Components\Environment\PhpVersion;

class GatherApplicationInformation
{
    protected array $data = [];

    public function __construct()
    {
        $this->gatherInformation();
    }

    public function get(): array
    {
        return $this->getInformation();
    }

    private function getInformation(): array
    {
        return $this->data;
    }

    private function addSection(string $section, array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[$section][] = [$key => $value];
        }
    }

    private function gatherInformation(): void
    {
        $this->addSection('Environment', [
            'Laravel Version' => app(LaravelVersion::class)->get(),
            'PHP Version' => app(PhpVersion::class)->get(),
            'Composer Version' => app(ComposerVersion::class)->get(),
            'Environment' => app(LaravelEnvironment::class)->get(),
            'Debug Mode' => app(LaravelDebugMode::class)->get(),
            'Application Name' => app(LaravelApplicationName::class)->get(),
            'URL' => app(LaravelUrl::class)->get(),
            'Maintenance Mode' => app(LaravelMaintenanceMode::class)->get(),
        ]);

        $this->addSection('Cache', [
            'Config' => app(LaravelConfig::class)->get(),
            'Routes' => app(LaravelRoutes::class)->get(),
            'Events' => app(LaravelEvents::class)->get(),
            'Views' => app(LaravelViews::class)->get(),
        ]);

        $this->addSection('Drivers', [
            'Broadcasting' => app(LaravelBroadcasting::class)->get(),
            'Cache' => app(LaravelCache::class)->get(),
            'Database' => app(LaravelDatabase::class)->get(),
            'Mail' => app(LaravelMail::class)->get(),
            'Octane' => app(LaravelOctane::class)->get(),
            'Queue' => app(LaravelQueue::class)->get(),
            'Scout' => app(LaravelScout::class)->get(),
            'Session' => app(LaravelSession::class)->get(),
        ]);
    }
}
