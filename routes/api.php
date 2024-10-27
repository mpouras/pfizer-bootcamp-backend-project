<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


// Creates RESTful API routes for the ProductController with standard actions (index, show, store, update, destroy)
Route::apiResource('products',ProductController::class);