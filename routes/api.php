<?php
use Illuminate\Support\Facades\Route;
use Core\Api\Http\Controllers\CustomersController;
use Core\Api\Http\Controllers\ProductsController;

Route::apiResources([
    'customers' => 'CustomersController',
    'products' => 'ProductsController'
]);
