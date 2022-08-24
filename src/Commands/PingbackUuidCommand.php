<?php

namespace Duplexmedia\Pingback\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class PingbackUuidCommand extends Command
{
    public $signature = 'pingback:uuid';

    public $description = 'Generate a uuid';

    public function handle()
    {
        $this->line('Your UUID: ' . Str::uuid());
    }
}
