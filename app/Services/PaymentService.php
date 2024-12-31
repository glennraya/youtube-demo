<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class PaymentService
{
    protected $payment_processor;
    public function __construct(PaymentProcessor $payment_processor)
    {
        $this->payment_processor = $payment_processor;
    }

    /**
     * Delegates the actual payment to whichever payment processor is passed in.
     *
     * @param float $amount
     */
    public function process(float $amount)
    {
        return $this->payment_processor->pay($amount);
    }
}
