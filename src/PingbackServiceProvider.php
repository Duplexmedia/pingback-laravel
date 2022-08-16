<?php

namespace Duplexmedia\Pingback;

use Duplexmedia\Pingback\Commands\PingbackCommand;
use Duplexmedia\Pingback\Helpers\Url;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class PingbackServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->app->instance(Url::class, new Url());
            $this->app->booted(function () {
                $schedule = $this->app->make(Schedule::class);
                $schedule->command('pingback:send')->daily();
            });

            $this->commands([
                PingbackCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pingback.php', 'pingback');
    }
}
