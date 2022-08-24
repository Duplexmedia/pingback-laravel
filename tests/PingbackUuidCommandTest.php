<?php

namespace Duplexmedia\Pingback\Tests;

use Mockery;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;

class PingbackUuidCommandTest extends TestCase
{
    public function test_run_pingback_uuid_command()
    {
        $stringUuid = '253e0f90-8842-4731-91dd-0191816e6a28';
        $uuid = Uuid::fromString($stringUuid);
        $factoryMock = Mockery::mock(UuidFactory::class . '[uuid4]', [
            'uuid4' => $uuid,
        ]);

        Uuid::setFactory($factoryMock);

        $this->artisan('pingback:uuid')
            ->expectsOutput('Your UUID: 253e0f90-8842-4731-91dd-0191816e6a28')
            ->assertExitCode(0);
    }
}
