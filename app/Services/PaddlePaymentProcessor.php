<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class PaddlePaymentProcessor implements PaymentProcessor
{
    public function pay(float $amount)
    {
        // Hypothetical Paddle payment logic
        // e.g., using the Paddle API
        return true;
    }
}
