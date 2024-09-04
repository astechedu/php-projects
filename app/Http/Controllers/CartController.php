<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Cart;
use App\Models\User;

use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;

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
       //$cart = Cart::where('pid', $product_pid);  ///If id not primary
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

	         	  //Send Mail Example
	           	  //Mail::to('ajaysisaudiya@gmail.com')->send(new MyTestEmail($cart));
       }
       if(!empty($cart)){   
   	  	   	         
            if($cart->pid === (int) $product_pid){
            	//echo $request->qty;exit;
                  //$cart = new Cart;
			      $cart->qty += (int) $request->qty;
	         	  $cart->update();
	  
                 //return response()->json( [ 'success' => 'Customer registered successfully!' ] );
            }    	
       }        
	  //return response()->json( [ 'success' => 'Customer registered successfully!' ] );
       
	  return redirect()->back();
	}

    //Remove cart
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

        //return redirect()->route('cart.addToCart');
	}	

    //Cart Coutner
	public function cartItemCount(Request $request) 
	{	
        if($request->ajax() && $request->method() == "GET"){
			$carts = Cart::all();
			$cartCounter = count($carts);
            return response()->json(['cartCounter' => $cartCounter]);
        }
         //return response()->json(['cartCounter' => 100]);       
	}


    //Sending Mail Example
	public function sendmail(Request $request) 
	{	
		//echo "hhi";exit;
	    $mailData['name'] = "Funny Coder";
	    $mailData['title'] = "Testing Mail";
	  //$id = $request->id;
	  //$id = 1;
	  // $user = User::find($id);
	    //Or
     // $user = User::all();
      //dd($user); exit;
      Mail::to('ajaysisaudiya@gmail.com')->send(new MyTestEmail($mailData));

      return 'Email Successully sent to the user!';
	}


//Event and listener Testing
	public function AdminNotify(Request $request) 
	{     
		event(new PostEvent("Email has been sent to admin! <br>")); 
	}	  
	public function eventlistener(Request $request) 
	{     
		event(new PostEvent("Email has been sent to user! <br>")); 
	}	
    
	public function userNotify(Request $request) 
	{     
		//event(new PostEvent("Email has been sent to user! <br>")); 
	    //event(new PostEvent(MyTestEmail()); 
	}	
  
}
	