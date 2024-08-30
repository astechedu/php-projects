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

	public function addToCart(Request $request)
	{		

       $product_pid = $request->pid;
       $cart = Cart::find($product_pid);
		
       if(empty($cart)){
	   		 $cart = new Cart; 
			      $cart->name = $request->pname;
			      $cart->price = $request->pprice;
			      $cart->description = $request->description;
			      $cart->qty = $request->qty;
			      $cart->pid = $request->pid;
	         	  $cart->save();
       }
       if(!empty($cart)){   
            if($cart->pid === (int) $request->pid){
                  //$cartObj = new Cart;			       
			      $cart->qty += (int) $request->qty;
	         	  $cart->update();
            }    	
       }        

	  return redirect('/');
	}

	public function cartItemCount(Request $request) 
	{
     if($request->method() == "POST")
	  $cart = Cart::get();
	  $noOfItems = count($cart);
      //echo $noOfItems;
      return response()->json(array("cartCounter" => $noOfItems));
	}	
    

}
	