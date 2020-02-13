<?php

use Illuminate\Support\Facades\Route;
use Core\Api\Http\Controllers\CustomersController;
use Core\Api\Http\Controllers\ProductsController;

Route::middleware('logger')->group(function() {
    Route::resources(
        [
            'customers' => CustomersController::class,
            'products' => ProductsController::class,
        ]
    );
});
