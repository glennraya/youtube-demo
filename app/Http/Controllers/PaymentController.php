<?php

namespace App\Http\Controllers;

use App\Services\PaddlePaymentProcessor;
use App\Services\PaymentService;
use App\Services\StripePaymentProcessor;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        match (config('payment.payment_processor')) {
            'stripe' => $payment_processor = new StripePaymentProcessor(),
            'paddle' => $payment_processor = new PaddlePaymentProcessor(),
        };

        $payment_service = new PaymentService($payment_processor);
        $payment_successful = $payment_service->process($request->amount);

        if ($payment_successful) {
            return response()->json(['message' => "Payment processed by " . config('payment.payment_processor')]);
        }

        return response()->json(['message' => 'Payment failed.'], 500);
    }
}
