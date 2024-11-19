<?php
namespace App\Contracts;

interface PaymentProvider{
    public function charge($amount, $currency);
}
