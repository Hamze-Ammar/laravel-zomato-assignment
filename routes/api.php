<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;

Route::post('/sign_up', [UserController::class, 'signUp'])->name("sign_up");

Route::post('/add_resto', [RestaurantController::class, 'addResto'])->name("add_resto");
