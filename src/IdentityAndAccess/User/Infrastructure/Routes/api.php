<?php

use Illuminate\Support\Facades\Route;
use Src\IdentityAndAccess\User\Infrastructure\Controllers\UserController;

Route::prefix('user')->controller(UserController::class)->group(function () {

});