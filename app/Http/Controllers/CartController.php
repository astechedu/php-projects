<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
//use Illuminate\View\View;

class CartController extends Controller
{
	public function index() //: view
	{

		return view('cart/cart_listing');
	}
	public function addToCart() 
	{

      //d("Add to cart");
		return view('cart/add_to_cart');
	}
}
