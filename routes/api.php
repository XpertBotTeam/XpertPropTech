<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AgentsController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\PropertiesController;

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::group(['middleware'=>'auth:sanctum'],function(){  
    Route::resource('Agents',AgentsController::class);
    Route::resource('Client',ClientController::class);
    Route::resource('Properties',PropertiesController::class);
    
});


