<?php

use Illuminate\Support\Facades\Route;
use Src\ProductManagement\Product\Infrastructure\Controllers\ProductController;

Route::prefix('product')->controller(ProductController::class)->group(function () {

});