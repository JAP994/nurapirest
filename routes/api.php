<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MaintenanceController;
use App\Http\Controllers\Api\DonorController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\CollectedController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//USUARIO
Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);
//users
Route::apiResource('users', UserController::class)->middleware('auth:api');
//maintenances
Route::apiResource('maintenances', MaintenanceController::class)->middleware('auth:api');
//donors 
Route::apiResource('donors', DonorController::class)->middleware('auth:api');
//donations 
Route::apiResource('donations', DonationController::class)->middleware('auth:api');
//deliveries 
Route::apiResource('deliveries', DeliveryController::class)->middleware('auth:api');
//collecteds 
Route::apiResource('collecteds', CollectedController::class)->middleware('auth:api');