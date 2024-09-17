<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->id){
            $auth_id = Auth::user()->name;
            $payment = ['subtotal'=>200, 'discount'=>10, 'shipping'=>40, 'total'=>1000, 'auth_id'=>$auth_id];
            return view('payment.checkout', ['payment'=>$payment]);
        }
        return 'Sign in';
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
    public function show(fr $fr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fr $fr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fr $fr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fr $fr)
    {
        //
    }
}
