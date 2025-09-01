<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [RegisterController::class,'login']);
Route::middleware('auth:api')->post('/logout', [RegisterController::class,'logout']);


Route::middleware('auth:api')->apiResource('/tickets', TicketController::class);

Route::middleware('auth:api')->apiResource('/user',UserController::class);