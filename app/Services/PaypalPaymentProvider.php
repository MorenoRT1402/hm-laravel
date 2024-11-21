<?php
namespace App\Payments;

use App\Contracts\PaymentProvider;

class PaypalPaymentProvider implements PaymentProvider
{
    public function processPayment(array $data)
    {
        file_put_contents('payments.log', json_encode($data));
    }
}