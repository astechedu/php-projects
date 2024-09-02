<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Cart;

use App\Events\PostEvent;

class CartController extends Controller
{
	public function index(): view
	{
		$carts = Cart::all();
		return view('cart/cart_listing',compact('carts'));
	}

	public function addToCart(Request $request)
	{		
       
         	
       $product_pid = (int) $request->pid;
       //$cart = Cart::findOrFail($product_pid);
       //$cart = Cart::where('pid', $product_pid);  //If id not primary
       $cart = Cart::firstWhere('pid', $product_pid);
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
   	  	   	         
            if($cart->pid === (int) $product_pid){
            	//echo $request->qty;exit;
                  //$cart = new Cart;
			      $cart->qty += (int) $request->qty;
	         	  $cart->update();

            }    	
       }        
	  //return response()->json( [ 'success' => 'Customer registered successfully!' ] );
       
	  //return redirect()->back();
	}


	public function cartItemRemove(Request $request) 
	{	
        if($request->ajax() && $request->method() == "DELETE"){

 			$cartpid = (int) $request->pid;        
      		$pid = Cart::firstWhere('pid', $cartpid);

      		if($pid){
      			$pid->delete();      		         	
              // call the event             

			  return response()->json(array("success" => "Item pid $cartpid succesfully deleted","pid"=>$cartpid));
			}
  		                     
			return response()->json(array("success" => "Item pid $cartpid not found or already deleted","pid"=>$cartpid));

        }
      //$cartpid = (int) $request->pid;        
      //$pid = Cart::where('pid', $cartpid)->delete();      
      		//return response()->json(["success no"]);     
      //return response()->json(array("success" => "Item $cartPid successfully deleted!"));
 			//return response()->json(array("success" => "Item pid $cartpid not found or already deleted","pid"=>$cartpid));
        return redirect()->route('cart.addToCart');
	}	



//Event and listener Testing

	public function eventlistener(Request $request) 
	{     
		event(new PostEvent("Email has been sent to user"));     
	}	
    

}
	