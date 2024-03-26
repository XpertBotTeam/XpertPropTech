<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class, 'register'] );
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
