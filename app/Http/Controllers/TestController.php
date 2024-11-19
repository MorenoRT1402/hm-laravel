<?php
namespace App\Http\Controllers;

use App\Contracts\PaymentProvider;

class TestController extends Controller{
    public function __construct(PaymentProvider $pay) {
        dd($pay);
    }

    public function index() {
        return 'Test';
    }
}