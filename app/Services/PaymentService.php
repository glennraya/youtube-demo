<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class PaymentService
{
    protected $paymentProcessor;

    public function __construct(PaymentProcessor $paymentProcessor)
    {
        $this->paymentProcessor = $paymentProcessor;
    }

    public function process(float $amount): bool
    {
        // Delegates the actual payment to whichever PaymentProcessor is passed in
        return $this->paymentProcessor->pay($amount);
    }
}
