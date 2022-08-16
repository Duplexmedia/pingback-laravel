<?php

namespace Duplexmedia\Pingback\Tests;

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
use Duplexmedia\Pingback\GatherApplicationInformation;
use Mockery;

class GatherApplicationInformationTest extends TestCase
{
    public function test_can_get_formatted_information()
    {
        $this->mock(LaravelVersion::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xLaravelVersion');
        });
        $this->mock(PhpVersion::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xPHPVersion');
        });
        $this->mock(ComposerVersion::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xComposerVersion');
        });
        $this->mock(LaravelEnvironment::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xEnvironment');
        });
        $this->mock(LaravelDebugMode::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturnTrue();
        });
        $this->mock(LaravelApplicationName::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xApplicationName');
        });
        $this->mock(LaravelUrl::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xURL');
        });
        $this->mock(LaravelMaintenanceMode::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturnTrue();
        });
        $this->mock(LaravelConfig::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturnTrue();
        });
        $this->mock(LaravelRoutes::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturnTrue();
        });
        $this->mock(LaravelEvents::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturnTrue();
        });
        $this->mock(LaravelViews::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturnTrue();
        });
        $this->mock(LaravelBroadcasting::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xBroadcasting');
        });
        $this->mock(LaravelCache::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xCache');
        });
        $this->mock(LaravelDatabase::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xDatabase');
        });
        $this->mock(LaravelMail::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xMail');
        });
        $this->mock(LaravelOctane::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xOctane');
        });
        $this->mock(LaravelQueue::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xQueue');
        });
        $this->mock(LaravelScout::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xScout');
        });
        $this->mock(LaravelSession::class, function (Mockery\MockInterface $mock) {
            $mock->shouldReceive('get')->andReturn('xSession');
        });

        $applicationInformation = new GatherApplicationInformation();

        $this->assertSame([
            'Environment' => [
                [
                    'Laravel Version' => 'xLaravelVersion',
                ],
                [
                    'PHP Version' => 'xPHPVersion',
                ],
                [
                    'Composer Version' => 'xComposerVersion',
                ],
                [
                    'Environment' => 'xEnvironment',
                ],
                [
                    'Debug Mode' => true,
                ],
                [
                    'Application Name' => 'xApplicationName',
                ],
                [
                    'URL' => 'xURL',
                ],
                [
                    'Maintenance Mode' => true,
                ],
            ],
            'Cache' => [
                [
                    'Config' => true,
                ],
                [
                    'Routes' => true,
                ],
                [
                    'Events' => true,
                ],
                [
                    'Views' => true,
                ],
            ],
            'Drivers' => [
                [
                    'Broadcasting' => 'xBroadcasting',
                ],
                [
                    'Cache' => 'xCache',
                ],
                [
                    'Database' => 'xDatabase',
                ],
                [
                    'Mail' => 'xMail',
                ],
                [
                    'Octane' => 'xOctane',
                ],
                [
                    'Queue' => 'xQueue',
                ],
                [
                    'Scout' => 'xScout',
                ],
                [
                    'Session' => 'xSession',
                ],
            ],
        ], $applicationInformation->get());
    }
}
