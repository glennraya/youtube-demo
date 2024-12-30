<?php

namespace App\Contracts;

interface PaymentProcessor
{
    public function pay(float $amount);
}
