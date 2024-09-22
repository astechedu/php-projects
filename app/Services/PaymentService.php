<?php

namespace App\Services;

class PaymentService
{
    // method to process payment
    public function processPayment($amount, $paymentMethod)
    {
        // implementation of payment processing logic
        // ...
        echo 'Payment Service: <br> ( <br> Amount: '.$amount, '<br> Payment Mode: '.$paymentMethod. "<br>)";
    }
}
