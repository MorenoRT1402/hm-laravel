<?php
namespace App\Contracts;

interface PaymentProvider
{
    public function processPayment(array $data);
}