@extends('layouts.default')

@section('content')
    <h1>Payment Page</h1>
    <h6>Your Order</h6>
    Name: {{ $payment['auth_id'] }}
    <div><strong>Subtotal:</strong> {{ $payment['subtotal'] }}</div>
    <div><strong>Discount:</strong> {{ $payment['discount'] }}</div>
    <div><strong>Shipping:</strong> {{ $payment['shipping'] }}</div>
    <div><strong>Total:</strong> {{ $payment['total'] }}</div>   
@endsection