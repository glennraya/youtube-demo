<?php

namespace App\Contracts;

interface PaymentGatewayInterface
{
    public function charge(float $amount);
}
