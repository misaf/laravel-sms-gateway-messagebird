<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayMessageBird;

use Illuminate\Contracts\Foundation\Application;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayMessageBird\Drivers\MessageBirdDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class MessageBirdSmsGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-sms-gateway-messagebird');
    }

    public function packageRegistered(): void
    {
        $this->app->afterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager, Application $app): void {
            $manager->extend('messagebird', fn(): MessageBirdDriver => $app->make(MessageBirdDriver::class));
        });

        if ($this->app->bound('sms-gateway')) {
            $this->app->make('sms-gateway')->extend('messagebird', fn(Application $app): MessageBirdDriver => $app->make(MessageBirdDriver::class));
        }
    }
}
