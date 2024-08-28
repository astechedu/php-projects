<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
//use Illuminate\View\View;
use App\Models\Product;

class CartController extends Controller
{
	public function index() //: view
	{
		return view('cart/cart_listing');
	}
	public function addToCart(Request $request) 
	{
	  //dd($request);exit;
      $product = new Product();
      $product->name = $request->pname;
      $product->price = $request->pprice;
      $product->description = $request->description;
      //$product->is_active = $request->is_active;
      //$product->save();
      dd($product);
	  return view('cart/cart_listing');
	}
}
