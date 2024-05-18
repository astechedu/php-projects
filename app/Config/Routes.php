<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Product::index');
$routes->get('/products', 'Product::index');
$routes->get('/grid', 'Product::product_grid_view');
$routes->get('/cart', 'Cart::index');
$routes->get('/categories', 'Category::index');
