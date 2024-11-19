<?php
namespace App\Helpers;

class PriceHelper{
    public static function applyDiscount($price, $discount){
        return $price * (1 - $discount / 100);
    }
}
