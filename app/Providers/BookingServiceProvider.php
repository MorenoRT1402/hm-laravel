<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Mail\BookingEmail;
use Illuminate\Support\Facades\Mail;

use App\Contracts\PaymentProvider;
use App\Services\PaypalPaymentProvider;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
    //Here we link the interface with the concrete implementation
    $this->app->bind(PaymentProvider::class, PaypalPaymentProvider::class);
    }

    /**
     * Perform any initialization work after the services have been registered.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('sendBookingEmail', function ($app) {
            return function ($booking, $room, $price) {
                Mail::to('admin@example.com')->send(new BookingEmail(
                    $booking->guest, 
                    $room, 
                    $booking->check_in, 
                    $booking->check_out,
                    $price, 
                    $booking->notes, 
                    $booking->picture,
                    now()
                ));
            };
        });
    }
}
