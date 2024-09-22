<?php

namespace App\Facades;

class Payment
{
    // method to process payment
    public function processPayment($amount, $paymentMethod)
    {
        // implementation of payment processing logic
        // ...
        echo 'Payment Service: <br> ( <br> Amount: '.$amount, '<br> Payment Mode: '.$paymentMethod. "<br>)";
    }
}
