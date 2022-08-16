<?php

namespace Duplexmedia\Pingback\Tests\Components\Environment;

use Duplexmedia\Pingback\Components\Environment\LaravelMaintenanceMode;
use Duplexmedia\Pingback\Tests\TestCase;
use Illuminate\Support\Facades\App;

class LaravelMaintenanceModeTest extends TestCase
{
    public function test_can_get_laravel_disabled_maintenance_mode()
    {
        App::shouldReceive('isDownForMaintenance')
            ->andReturn(false);

        $maintenanceMode = (new LaravelMaintenanceMode())->get();

        $this->assertFalse($maintenanceMode);
    }

    public function test_can_get_laravel_enabled_maintenance_mode()
    {
        App::shouldReceive('isDownForMaintenance')
            ->andReturn(true);

        $maintenanceMode = (new LaravelMaintenanceMode())->get();

        $this->assertTrue($maintenanceMode);
    }
}
