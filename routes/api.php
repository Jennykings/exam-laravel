<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('User')->group(base_path('src/IdentityAndAccess/User/infrastructure/routes/api.php'));

Route::prefix('Customer')->group(base_path('src/CustomerManagement/Customer/infrastructure/routes/api.php'));

Route::prefix('Product')->group(base_path('src/ProductManagement/Product/infrastructure/routes/api.php'));

Route::prefix('Product')->group(base_path('src/ProductManagement/Product/infrastructure/routes/api.php'));

Route::prefix('Order')->group(base_path('src/OrderManagement/Order/infrastructure/routes/api.php'));
