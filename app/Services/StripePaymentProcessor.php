<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class StripePaymentProcessor implements PaymentProcessor
{
    public function pay(float $amount)
    {
        // Hypothetical Stripe payment logic
        // e.g., using the Stripe API
        return true;
    }
}
