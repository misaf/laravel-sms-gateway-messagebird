<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayMessageBird\Drivers;

use Illuminate\Http\Client\PendingRequest;
use Misaf\LaravelSmsGateway\SmsGatewayDriver;

final class MessageBirdDriver extends SmsGatewayDriver
{
    protected function driverName(): string
    {
        return 'messagebird';
    }

    protected function defaultGateway(): string
    {
        return 'https://rest.messagebird.com/';
    }

    protected function configureRequest(PendingRequest $request): PendingRequest
    {
        return $request
            ->withHeader('Authorization', 'AccessKey ' . $this->serviceConfigString('access_key'))
            ->acceptJson()
            ->asJson();
    }
}
