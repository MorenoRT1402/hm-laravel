<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\PaymentProvider;
use App\Services\PaypalPaymentProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void{
        $this->app->bind(
            PaymentProvider::class, 
            PaypalPaymentProvider::class
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
