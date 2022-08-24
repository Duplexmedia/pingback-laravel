<?php

namespace Duplexmedia\Pingback\Commands;

use Duplexmedia\Pingback\Pingback;
use Illuminate\Console\Command;

class PingbackSendCommand extends Command
{
    public $signature = 'pingback:send';

    public $description = 'Send laravel system information to diagnostic server';

    public function handle()
    {
        $this->comment('Collecting system information');

        $pingback = (new Pingback());
        $pingback->sendInformation();

        return 0;
    }
}
