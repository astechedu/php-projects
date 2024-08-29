<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Cart;

class CartController extends Controller
{
	public function index(): view
	{
		$carts = Cart::all();
		return view('cart/cart_listing',compact('carts'));
	}
	public function addToCart(Request $request)//: view 
	{
	  //dd($request);exit;
      $cart = new Cart;
      $cart->name = $request->pname;
      $cart->price = $request->pprice;
      $cart->description = $request->description;
      $cart->qty = $request->qty;
      //$product->is_active = $request->is_active;
      //$cart->save();

      if($request->qty < 1){
        // $cart->qty = 0
      }
      	$cart->qty=$request->qty++;
		$cart->save();
      //dd($cart);
	  return redirect('/');
	}
}
