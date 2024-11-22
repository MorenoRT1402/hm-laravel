<?php
namespace App\Services;

use App\Contracts\PaymentProvider;

use Illuminate\Http\RedirectResponse;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class StripePaymentProvider implements PaymentProvider
{
    public function processPayment(array $data): string{
        Stripe::setApiKey(config('services.stripe.secret'));
    
        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $data['product_name'] ?? 'Reservation',
                        ],
                        'unit_amount' => $data['amount'],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);
    
        return $session->url;
    }
}