<?php

namespace App\Http\Controllers;

use App\Services\PaddlePaymentProcessor;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Services\StripePaymentProcessor;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        match (config('payment.payment_processor')) {
            'stripe' => $paymentProcessor = new StripePaymentProcessor(),
            'paddle' => $paymentProcessor = new PaddlePaymentProcessor(),
        };

        $paymentService = new PaymentService($paymentProcessor);
        $paymentSuccessful = $paymentService->process($request->amount);

        if ($paymentSuccessful) {
            return response()->json(['message' => "Payment processed by " . config('payment.payment_processor') . "."]);
        }

        return response()->json(['message' => 'Payment failed.'], 500);
    }
}
