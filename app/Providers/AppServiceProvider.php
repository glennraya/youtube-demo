<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayInterface;
use App\Http\Controllers\PayPalPaymentGateway;
use App\Http\Controllers\StripePaymentGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PaymentGatewayInterface::class,
            PayPalPaymentGateway::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
