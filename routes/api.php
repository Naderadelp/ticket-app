<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [RegisterController::class,'login']);
Route::apiResource('/tickets', TicketController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});