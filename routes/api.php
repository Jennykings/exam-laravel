<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([], function () { // CustomerManagement
    require base_path('src/CustomerManagement/Customer/Infrastructure/Routes/api.php');
});

Route::group([], function () { // ProductManagement
    require base_path('src/ProductManagement/Product/Infrastructure/Routes/api.php');
});

Route::group([], function () { // OrderManagement
    require base_path('src/OrderManagement/Order/Infrastructure/Routes/api.php');
});

Route::group([], function () { // IdentityAndAccess
    require base_path('src/IdentityAndAccess/User/Infrastructure/Routes/api.php');
});