<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;

Route::post('/sign_up', [UserController::class, 'signUp'])->name("sign_up");
Route::post('/sign_in', [UserController::class, 'signIn'])->name("sign_in");
Route::post('/add_review', [UserController::class, 'addReview'])->name("addReview");
Route::post('/edit_profile/{id}', [UserController::class, 'editProfile'])->name("edit_profile");

Route::post('/add_resto', [RestaurantController::class, 'addResto'])->name("add_resto");
Route::post('/get_restaurants/{id?}', [RestaurantController::class, 'getRestaurants'])->name("get_restaurants");
Route::get('/get_rest_review/{id}', [RestaurantController::class, 'getRestReview'])->name("get_rest_review");


Route::post('/approve_review', [AdminController::class, 'approveReview'])->name("approve_review");
Route::get('/get_pending_reviews', [AdminController::class, 'getPendingReviews'])->name("get_pending_reviews");
