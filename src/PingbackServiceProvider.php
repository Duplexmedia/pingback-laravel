<?php

namespace Duplexmedia\Pingback;

use Duplexmedia\Pingback\Commands\PingbackSendCommand;
use Duplexmedia\Pingback\Commands\PingbackUuidCommand;
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
                if ($this->app->environment('production')) {
                    $schedule = $this->app->make(Schedule::class);
                    $schedule->command('pingback:send')->daily();
                }
            });

            $this->commands([
                PingbackSendCommand::class,
                PingbackUuidCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pingback.php', 'pingback');
    }
}
