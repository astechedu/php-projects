<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;
use App\Services\PaymentService;
use App\Facades\PaymentFacade;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;        
        $this->paymentService->processPayment(100, 'debit card');


        //Payment Facade App\Facades\PaymentFacade;
        PaymentFacade::processPayment(900, 'Credit Card');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user() != null) {
            $auth_name = Auth::user()->name;
            $payment = [
                "subtotal" => 200,
                "discount" => 10,
                "shipping" => 40,
                "total" => 1000,
                "auth_name" => $auth_name,
            ];
            return view("payment.checkout", ["payment" => $payment]);
        } else {
            return redirect()
                ->back()
                ->with("success", "You are not logged in.");
        }
        //return redirect()->route('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
