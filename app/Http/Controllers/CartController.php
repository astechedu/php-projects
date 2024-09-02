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
          if($request->ajax() && $request->method() == "POST"){
          	echo "hiiii";
          }
       $product_pid = (int) $request->pid;

       $cart = Cart::find($product_pid);

       //dd($cart);exit;
		
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
	return response()->json( [ 'success' => 'Customer registered successfully!' ] );
	  //return redirect('/');
	}

	public function cartItemCount(Request $request) 
	{
     if($request->ajax() && $request->method() == "GET"){
		$cart = Cart::get();
		$noOfItems = count($cart);
     	 //echo $noOfItems;
		return response()->json(array("cartCounter" => $noOfItems));     	
     }
	    //return response()->json(array("cartCounter" => "No"));
		return redirect('/');

	}	
    
	public function cartItemRemove(Request $request) 
	{	

        if($request->ajax() && $request->method() == "POST"){
 			$cartpid = (int) $request->pid;        
      		$pid = Cart::where('pid', $cartpid)->delete();          	
            //return response()->json(["success","Item $cartpid succesfully deleted"]);
			  return response()->json(array("success" => "Item $cartpid succesfully deleted","pid"=>$cartpid));
        }
      //$cartpid = (int) $request->pid;        
      //$pid = Cart::where('pid', $cartpid)->delete();      
      		return response()->json(["success no"]);     
      //return response()->json(array("success" => "Item $cartPid successfully deleted!"));

	}	
}
	