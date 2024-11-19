<?php
namespace App\Services;

use App\Contracts\PaymentProvider;

class PaypalPaymentProvider implements PaymentProvider
{
    public function charge($amount, $currency){
        return "Pago realizado con PayPal: {$amount} {$currency}\n";
    }
}
