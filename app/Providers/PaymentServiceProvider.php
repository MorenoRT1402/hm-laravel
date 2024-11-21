<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\PaymentProvider;
use App\Services\StripePaymentProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void{
        $this->app->bind(
            PaymentProvider::class, 
            StripePaymentProvider::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
