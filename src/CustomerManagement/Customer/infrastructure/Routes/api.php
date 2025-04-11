<?php

use Illuminate\Support\Facades\Route;
use Src\CustomerManagement\Customer\Infrastructure\Controllers\CustomerController;

Route::prefix('customer')->controller(CustomerController::class)->group(function () {

});