<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayInterface;
use Illuminate\Http\Request;

// Low level module
class StripePaymentGateway implements PaymentGatewayInterface
{
    public function charge(float $amount)
    {
        return [
            'status' => 'success',
            'message' => 'Paid using Stripe.'
        ];
    }
}

// Low level module
class PayPalPaymentGateway implements PaymentGatewayInterface
{
    public function charge(float $amount)
    {
        return [
            'status' => 'success',
            'message' => 'Paid using Paypal.'
        ];
    }
}

// High level module (controller/services classes)
class OnlinePaymentController extends Controller
{
    private PaymentGatewayInterface $payment_gateway;

    public function __construct(PaymentGatewayInterface $payment_gateway)
    {
        $this->payment_gateway = $payment_gateway;
    }

    public function processPayment(Request $request)
    {
        $amount = (float) $request->input('amount', 0.0);

        $result = $this->payment_gateway->charge($amount);

        if ($result) {
            return response()->json($result);
        } else {
            return response()->json(['status' => 'Payment failed.'], 400);
        }
    }
}
