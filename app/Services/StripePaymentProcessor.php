<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class StripePaymentProcessor implements PaymentProcessor
{
    public function pay(float $amount)
    {
        // Stripe payment logic goes here...
        // E.g. Using the Stripe API
        return true;
    }
}
