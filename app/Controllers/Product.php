<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//use CodeIgniter\HTTP\RequestInterface;
//use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        return view('products/product_listing');
    }
}
