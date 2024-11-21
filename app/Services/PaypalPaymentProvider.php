<?php
namespace App\Services;

use App\Contracts\PaymentProvider;
use Illuminate\Support\Facades\Log;

class PaypalPaymentProvider implements PaymentProvider
{
    public function processPayment(array $data){
        Log::channel('payment')->info('Procesando pago para la reserva', $data);
        // file_put_contents('payments.log', json_encode($data));
    }
}