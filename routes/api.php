<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [RegisterController::class,'login']);
Route::middleware('auth:api')->post('/logout', [RegisterController::class,'logout']);


Route::middleware('auth:api')->apiResource('/tickets', TicketController::class);

Route::middleware('auth:api')->get('/user');